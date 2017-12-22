<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertRepository;
use App\Repositories\ProductRepository;

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
        return redirect(route('seller.product-advert.show-all'));
    }
}