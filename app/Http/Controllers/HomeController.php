<?php

namespace App\Http\Controllers;

use App\AdvertManager;
use App\Models\Category;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('product-advert.show-all'));
    }

    public function findByCategory($id)
    {

        $category = Category::find($id);

        $adverts = $category->adverts;

        $adverts = AdvertManager::getAdvertInfo($adverts);

        return view('adverts.index_by_category')->with(['adverts' => $adverts]);
    }

    public function productAdvertShow($id)
    {
        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {

            Flash::error('Advert not found');

            return redirect(route('home'));
        }

        $advert = AdvertManager::getAdvertDetails($advert);

        return view('product_advert.show')->with(['advert' => $advert]);
    }
}
