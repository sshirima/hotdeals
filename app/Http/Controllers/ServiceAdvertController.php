<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateServiceAdvertRequest;
use App\Repositories\AdvertRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CreateServiceAdvertRequest;
use App\Repositories\RegionRepository;
use Intervention\Image\Facades\Image;
use Flash;

class ServiceAdvertController extends Controller
{
    private $advertsRepo;
    private $regionRepo;
    private $categoryRepo;
    private $regions;
    private $categories;
    private $seller;

    public function __construct(AdvertRepository $advertRepository,
                                RegionRepository $regionRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
        $this->regionRepo = $regionRepository;
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seller = auth()->user();

        //$adverts = $this->advertsRepo->findWhere(['seller_id'=> $seller->id]);
        $adverts = $this->advertsRepo->findWhere(['seller_id' => $seller->id, 'adv_type' => 'Service'], ['id', 'title', 'approved', 'expiredate', 'seller_id']);
        foreach ($adverts as $advert) {
            $service = $advert->service()->first();
            $image = $advert->images()->first();
            $location = $advert->location()->first();
            $region = $location->region()->first();

            $advert['brand'] = $service->brand;
            $advert['p_cost'] = $service->p_cost;
            $advert['c_cost'] = $service->c_cost;
            $advert['img_name'] = $image->img_name;
            $advert['reg_name'] = $region->reg_name;
        }

        return view('service_advert.index')->with(['seller' => $seller, 'adverts' => $adverts]);
    }

    public function create()
    {
        $this->initialVariables();

        return view('service_advert.create')->with(['seller' => $this->seller,
            'regions' => $this->regions, 'categories' => $this->categories]);
    }

    private function initialVariables()
    {
        $this->regions = $this->regionRepo->get();
        $this->categories = $this->categoryRepo->get();
        $this->seller = auth()->user();
    }

    /**
     * @param CreateServiceAdvertRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateServiceAdvertRequest $request)
    {
        $input = $request->all();

        //Save the advert
        $advert = $this->advertsRepo->create($input);

        //Save product
        $service = $advert->service()->create($input);

        //Save image

        if ($request->hasFile('img_name')) {
            $images = $request->file('img_name');
            $i = 0;
            foreach ($images as $image) {
                $filename = time() . $i . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(900, 600)->save($location);
                $input['img_name'] = $filename;
                $saveImageInfo = $advert->images()->create($input);
                $i++;
            }
        }

        //Save location
        $location = $advert->location()->create($input);

        //Save category
        $advertCategory = $advert->categories()->attach($input['category_id']);

        Flash::success('Advert saved successfully.');

        return redirect(route('service-advert.index'));
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {

        $this->initialVariables();

        $advert = $this->advertsRepo->findWithoutFail($id);

        $advert['service'] = $advert->service()->select(['srv_name', 'srv_brand', 'p_cost', 'c_cost'])->first();

        $location = $advert->location()->select(['region_id'])->first();

        $advert['categories'] = $advert->categories()->get();

        $advert['region'] = $location->region()->first();

        return view('service_advert.edit')->with([
            'seller' => $this->seller,
            'advert' => $advert,
            'regions' => $this->regions,
            'categories' => $this->categories
        ]);
    }

    /**
     * @param $id
     * @param UpdateProductAdvertRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateServiceAdvertRequest $request)
    {
        $input = $request->all();

        $advert = $this->advertsRepo->update($input, $id);

        $service = $advert->service()->first()->update($input);

        $advert->categories()->detach();
        $advert->categories()->attach($input['category_id']);

        $location = $advert->location()->first()->update($input);

        if ($request->hasFile('img_name')) {
            $images = $request->file('img_name');
            $i = 0;
            $previousImages = $advert->images()->get();
            foreach ($images as $image) {
                $filename = time() . $i . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(900, 600)->save($location);
                $input['img_name'] = $filename;
                $saveImageInfo = $advert->images()->create($input);
                $i++;
            }

            //Deleting old images
            foreach ($previousImages as $image) {
                $image->forceDelete();
                \Storage::delete($image->img_name);
            }
        }

        return redirect(route('seller.service-advert.show', $id));
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showSeller($id)
    {

        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('service-advert.index'));
        }
        $advert['service'] = $advert->service()->first();
        $location = $advert->location()->first();
        $location['region'] = $location->region()->first();
        $advert['images'] = $advert->images()->get();
        $advert['categories'] = $advert->categories()->get();
        $advert['location'] = $location;

        return view('service_advert.show-seller')->with(['advert' => $advert, 'seller' => auth()->user()]);
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showUser($id)
    {
        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('seller.dashboard'));
        }
        $advert['product'] = $advert->product()->first();
        $location = $advert->location()->first();
        $location['region'] = $location->region()->first();
        $advert['images'] = $advert->images()->get();
        $advert['categories'] = $advert->categories()->get();
        $advert['location'] = $location;

        $advert['comments'] = $advert->comments()->get();
        foreach ($advert['comments'] as $comment) {
            $comment['posted_at'] = Comment::getTimeDifference(new \DateTime($comment->created_at));
            $comment['user'] = $comment->user()->select(['first_name', 'last_name'])->first();
        }

        $advert['rate'] = $advert->rates()->avg('value');

        return view('product_advert.show-user')->with(['advert' => $advert, 'user' => auth()->user()]);
    }
}
