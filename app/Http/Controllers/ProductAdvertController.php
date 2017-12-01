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
    private $advertsRepo;
    private $regionRepo;
    private $categoryRepo;

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
}
