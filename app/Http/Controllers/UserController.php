<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Repositories\AdvertRepository;
use Illuminate\Support\Facades\Event;

class UserController extends Controller
{
    private $advertsRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth');
        $this->advertsRepo = $advertRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$adverts = $this->advertsRepo->findWhere(['approved' => true], ['id', 'title', 'approved', 'expiredate', 'seller_id']);
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
        return view('user')->with(['adverts' => $adverts, 'user' => auth()->user()]);*/

        return redirect(route('user.product-advert.show-all'));
    }


}
