<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertRepository;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->advertsRepo = $advertRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = $this->advertsRepo->findWhere(['approved' => true], ['id', 'title', 'approved', 'expiredate', 'seller_id']);
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
        return view('welcome')->with(['adverts' => $adverts]);
    }
}
