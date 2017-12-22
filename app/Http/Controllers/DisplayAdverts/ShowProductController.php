<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/13/2017
 * Time: 9:20 PM
 */

namespace App\Http\Controllers\DisplayAdverts;

use App\AdvertManager;
use App\Http\Controllers\CategoryController;
use App\Models\Advert;
use App\Models\Category;
use App\Repositories\AdvertRepository;
use Laracasts\Flash\Flash;

class ShowProductController extends ShowAdvertBaseController
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->advertsRepo = $advertRepository;
    }

    public function showAll()
    {
        $adverts = $this->getAdverts(parent::$return_advert_column, ['approved' => true, 'adv_type' => 'Product'], parent::$PAGE_SIZE);

        $adverts = $this->getProductAdvertInfo($adverts);

        $categories = parent::getTopCategories('Product', 10);

        return view('displayadverts.showall.showall-products')->with(['adverts' => $adverts, 'topCategories' => $categories]);
    }

    public function showById($id)
    {
        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {

            Flash::error('Advert not found');

            return redirect(route('service-advert.show-all'));
        }

        $advert = parent::getAdvertDetails($advert);

        return view('displayadverts.byid.show-product')->with(['advert' => $advert]);

    }

    public function showByCategory($category_id)
    {
        $category = Category::find($category_id);

        $adverts = $category->adverts()->select(ShowAdvertBaseController::$return_advert_column)
            ->where(['approved' => true, 'adv_type' => 'Product'])
            ->orderBy('id', 'desc')->paginate(5);

        $adverts = $this->getProductAdvertInfo($adverts);

        return view('displayadverts.bycategory.show-products')->with(['adverts' => $adverts]);
    }

}