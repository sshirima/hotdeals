<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertRepository;
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
            ->select('adverts.id', 'adverts.title', 'products.brand', 'products.p_cost', 'products.c_cost', 'images.img_name')
            ->join('adverts', 'adverts.id', '=', 'products.advert_id')
            ->join('images', 'adverts.id', '=', 'images.advert_id')
            ->where('adverts.seller_id', '=', $seller->id)
            ->orderBy('adverts.created_at', 'desc')
            ->get();

        return view('seller')->with(['seller' => $seller, 'adverts' => $adverts]);
    }
}