<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertRepository;

class AdminController extends Controller
{
    private $advertsRepo;

    /**
     * AdminController constructor.
     * @param AdvertRepository $advertRepository
     */
    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth:admin');
        $this->advertsRepo = $advertRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = auth()->user();

        $adverts = $this->advertsRepo->findWhere(['approved' => false], ['id', 'title', 'approved', 'expiredate', 'seller_id']);

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

        return view('admin')->with(['admin' => $admin, 'adverts' => $adverts]);
    }
}
