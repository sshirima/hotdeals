<?php

namespace App\Http\Controllers;

use App\AdvertManager;
use App\Http\Requests\UpdateProductAdvertRequest;
use App\Repositories\AdvertRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CreateProductAdvertRequest;
use App\Repositories\RegionRepository;
use Intervention\Image\Facades\Image;
use Flash;

class ProductAdvertController extends Controller
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

        $adverts = $this->advertsRepo->findWhere(['seller_id' => $seller->id, 'adv_type' => 'Product'], ['id', 'title', 'approved', 'expiredate', 'seller_id']);
        foreach ($adverts as $advert) {
            $product = $advert->product()->first();
            $image = $advert->images()->first();
            $location = $advert->location()->first();
            $region = $location->region()->first();

            $advert['brand'] = $product->brand;
            $advert['p_cost'] = $product->p_cost;
            $advert['c_cost'] = $product->c_cost;
            $advert['img_name'] = $image->img_name;
            $advert['reg_name'] = $region->reg_name;
        }

        return view('product_advert.index')->with(['seller' => $seller, 'adverts' => $adverts]);
    }

    public function create()
    {
        $this->initialVariables();

        return view('product_advert.create')->with(['seller' => $this->seller,
            'regions' => $this->regions, 'categories' => $this->categories]);
    }

    /**
     * @param CreateProductAdvertRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateProductAdvertRequest $request)
    {
        $input = $request->all();

        //Save the advert
        $advert = $this->advertsRepo->create($input);

        //Save product
        $product = $advert->product()->create($input);

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

        return redirect(route('seller.dashboard'));
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {

        $this->initialVariables();

        $advert = $this->advertsRepo->findWithoutFail($id);

        $advert['product'] = $advert->product()->select(['name', 'brand', 'model', 'manufacturer', 'p_cost', 'c_cost'])->first();

        $location = $advert->location()->select(['region_id'])->first();

        $advert['categories'] = $advert->categories()->get();

        $advert['region'] = $location->region()->first();

        return view('product_advert.edit')->with([
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
    public function update($id, UpdateProductAdvertRequest $request)
    {
        $input = $request->all();

        $advert = $this->advertsRepo->update($input, $id);

        $product = $advert->product()->first()->update($input);

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

        return redirect(route('seller.product-advert.show', $id));
    }

    /**
     * Display the specified Advert.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function showSeller($id)
    {

        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('product-advert.index'));
        }

        $advert = AdvertManager::getAdvertDetails($advert);

        return view('product_advert.show-seller')->with(['advert' => $advert, 'seller' => auth()->user()]);
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

        $advert = AdvertManager::getAdvertDetails($advert);

        return view('product_advert.show-user')->with(['advert' => $advert, 'user' => auth()->user()]);
    }

    public function showAdmin($id)
    {

        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('admin.dashboard'));
        }

        $advert = AdvertManager::getAdvertDetails($advert);

        return view('product_advert.show-admin')->with(['advert' => $advert, 'admin' => auth()->user()]);
    }

    public function show($id)
    {
        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {

            Flash::error('Advert not found');

            return redirect(route('home'));
        }

        $advert = AdvertManager::getAdvertDetails($advert);

        return view('product_advert.show')->with(['advert' => $advert]);
    }

    private function initialVariables()
    {
        $this->regions = $this->regionRepo->get();
        $this->categories = $this->categoryRepo->get();
        $this->seller = auth()->user();
    }
}
