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
        return view('user')->with(['adverts' => $adverts, 'user' => auth()->user()]);
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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

        $advert['comments'] = $advert->comments()->get();
        foreach ($advert['comments'] as $comment) {
            $comment['posted_at'] = Comment::getTimeDifference(new \DateTime($comment->created_at));
            $comment['user'] = $comment->user()->select(['first_name', 'last_name'])->first();
        }

        $advert['rate'] = $advert->rates()->avg('value');

        return view('product_advert.show-user')->with(['advert' => $advert, 'user' => auth()->user()]);
    }


}
