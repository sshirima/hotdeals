<?php

namespace App\Http\Controllers;

use App\AdvertManager;
use App\Models\Category;
use App\Repositories\AdvertRepository;
use App\Repositories\CategoryRepository;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    private $advertsRepo;
    private $categoryRepo;

    public function __construct(AdvertRepository $advertRepository, CategoryRepository $categoryRepository)
    {
        $this->advertsRepo = $advertRepository;
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = $this->advertsRepo->findWhere(['approved' => true], ['id', 'title', 'approved', 'expiredate', 'seller_id']);

        $adverts = AdvertManager::getAdvertInfo($adverts);

        $categories = CategoryController::getPopularCategories();

        return view('home')->with(['adverts' => $adverts, 'topCategories' => $categories]);
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
