<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\CreateProductAdvertRequest;
use Intervention\Image\Facades\Image;

class ProductAdvertController extends Controller
{
    private $productsRepo;
    private $advertsRepo;
    private $imageRepo;

    public function __construct(AdvertRepository $advertRepository,
                                ProductRepository $productRepository, ImageRepository $imageRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
        $this->productsRepo = $productRepository;
        $this->imageRepo = $imageRepository;
    }

    public function create()
    {
        return view('product_advert.create')->with('seller', auth()->user());
    }

    public function store(CreateProductAdvertRequest $request)
    {
        $input = $request->all();

        //Save the advert
        $advert = $this->advertsRepo->create($input);


        //Save the product
        $input['advert_id'] = $advert->id;
        $product = $this->productsRepo->create($input);

        //Save the image
        if ($request->hasFile('img_name')) {
            $image = $request->file('img_name');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $input['img_name'] = $filename;
            $saveImageInfo = $this->imageRepo->create($input);
        }
        //Flash::success('Product saved successfully.');

        return redirect(route('seller.dashboard'));
    }
}
