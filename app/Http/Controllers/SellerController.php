<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\AdvertRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    private $advertsRepo;
    private $productRepo;

    /**
     * SellerController constructor.
     * @param AdvertRepository $advertRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(AdvertRepository $advertRepository, ProductRepository $productRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
        $this->productRepo = $productRepository;
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
        $adverts = $this->advertsRepo->findWhere(['seller_id' => $seller->id], ['id', 'title', 'approved', 'expiredate', 'seller_id']);
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

        return view('seller')->with(['seller' => $seller, 'adverts' => $adverts]);
    }

    /**
     * Display the specified Advert.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function productAdvertShow($id)
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

        return view('product_advert.show-seller')->with(['advert' => $advert, 'seller' => auth()->user()]);
    }
}