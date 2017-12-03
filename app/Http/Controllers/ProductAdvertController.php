<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductAdvertRequest;
use App\Models\Advert;
use App\Repositories\AdvertCategoryRepository;
use App\Repositories\AdvertRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ImageRepository;
use App\Repositories\LocationRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\CreateProductAdvertRequest;
use App\Repositories\RegionRepository;
use Intervention\Image\Facades\Image;
use Response;
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

    private function initialVariables()
    {
        $this->regions = $this->regionRepo->get();
        $this->categories = $this->categoryRepo->get();
        $this->seller = auth()->user();
    }
}
