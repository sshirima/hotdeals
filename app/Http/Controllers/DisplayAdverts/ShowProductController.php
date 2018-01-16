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
use App\Models\Location;
use App\Models\Region;
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
        $adverts = $this->productAdvertByCategory($category_id);

        return view('displayadverts.bycategory.show-products')->with(['adverts' => $adverts]);
    }

    public function showPerRegion($regionName = 'Dar es Salaam')
    {
        $locations = Region::select()->where(['reg_name'=>$regionName])->first()->locations()->get();
        $ads = array();

        foreach ($locations as $location){
            $ad = $location->advert()->select(['id', 'title', 'approved', 'expiredate', 'seller_id','adv_type'])->where(['approved' => true])->first();
            if (!$ad == null){
                array_push($ads, $ad);
            }
        }

        if (!empty($ads)){
            $productAdverts = array();
            $serviceAdverts = array();
            foreach ($ads as $advert){
                if($advert->adv_type === 'Product'){
                    array_push($productAdverts, $advert);
                } else {
                    array_push($serviceAdverts, $advert);
                }
            }
            if (sizeof($productAdverts) > sizeof($serviceAdverts)){
                $productAdverts = $this->getProductAdvertInfo($productAdverts);

                return view('displayadverts.bylocation.showall-products')->with(['adverts' => $productAdverts]);
            } else {
                $serviceAdverts = $this->getServiceAdvertInfo($serviceAdverts);

                return view('displayadverts.bylocation.showall-services')->with(['adverts' => $serviceAdverts]);
            }
        }
    }

}