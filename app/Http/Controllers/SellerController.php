<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertRepository;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    private $advertsRepo;

    /**
     * SellerController constructor.
     * @param AdvertRepository $advertRepository
     */
    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
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

        $adverts = DB::table('products')
            ->select('adverts.id', 'adverts.title', 'adverts.approved', 'products.brand', 'products.p_cost', 'products.c_cost', 'images.img_name', 'adverts.expiredate', 'regions.reg_name')
            ->join('adverts', 'adverts.id', '=', 'products.advert_id')
            ->join('images', 'adverts.id', '=', 'images.advert_id')
            ->join('locations', 'adverts.id', '=', 'locations.advert_id')
            ->join('regions', 'regions.id', '=', 'locations.region_id')
            ->where('adverts.seller_id', '=', $seller->id)
            ->orderBy('adverts.created_at', 'desc')
            ->get();

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
        $advert = DB::table('products')
            ->select('adverts.id', 'adverts.title', 'adverts.description', 'adverts.approved', 'products.brand', 'products.p_cost', 'products.c_cost', 'images.img_name', 'adverts.expiredate', 'regions.reg_name')
            ->join('adverts', 'adverts.id', '=', 'products.advert_id')
            ->join('images', 'adverts.id', '=', 'images.advert_id')
            ->join('locations', 'adverts.id', '=', 'locations.advert_id')
            ->join('regions', 'regions.id', '=', 'locations.region_id')
            ->where('adverts.id', '=', $id)
            ->get();

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('seller.dashboard'));
        }

        return view('product_advert.show-seller')->with(['advert' => $advert, 'seller' => auth()->user()]);
    }
}