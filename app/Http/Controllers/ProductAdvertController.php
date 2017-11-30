<?php

namespace App\Http\Controllers;

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
    private $productsRepo;
    private $advertsRepo;
    private $imageRepo;
    private $locationRepo;
    private $regionRepo;
    private $categoryRepo;
    private $advertCategoryRepo;

    public function __construct(AdvertRepository $advertRepository,
                                ProductRepository $productRepository,
                                ImageRepository $imageRepository,
                                LocationRepository $locationRepository,
                                RegionRepository $regionRepository,
                                CategoryRepository $categoryRepository,
                                AdvertCategoryRepository $advertCategoryRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
        $this->productsRepo = $productRepository;
        $this->imageRepo = $imageRepository;
        $this->locationRepo = $locationRepository;
        $this->regionRepo = $regionRepository;
        $this->categoryRepo = $categoryRepository;
        $this->advertCategoryRepo = $advertCategoryRepository;
    }

    public function create()
    {
        $regions = $this->regionRepo->get();
        $categories = $this->categoryRepo->get();
        return view('product_advert.create')->with(['seller' => auth()->user(),
            'regions' => $regions, 'categories' => $categories]);
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


        //Save the product
        $input['advert_id'] = $advert->id;
        $product = $this->productsRepo->create($input);

        //Save image
        if ($request->hasFile('img_name')) {
            $image = $request->file('img_name');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $input['img_name'] = $filename;
            $saveImageInfo = $this->imageRepo->create($input);
        }

        //Save location
        $location = $this->locationRepo->create($input);

        //Save category
        $advertCategory = $this->advertCategoryRepo->create($input);

        Flash::success('Advert saved successfully.');

        return redirect(route('seller.dashboard'));
    }
}
