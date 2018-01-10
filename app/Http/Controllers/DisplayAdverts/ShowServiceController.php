<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/13/2017
 * Time: 9:20 PM
 */

namespace App\Http\Controllers\DisplayAdverts;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\AdvertRepository;
use Laracasts\Flash\Flash;

class ShowServiceController extends ShowAdvertBaseController
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->advertsRepo = $advertRepository;
    }

    public function showAll()
    {
        $adverts = $this->getAdverts(ShowAdvertBaseController::$return_advert_column, ['approved' => true, 'adv_type' => 'Service'], 5);

        $this->getServiceAdvertInfo($adverts);

        $categories = parent::getTopCategories('Service', 10);

        return view('displayadverts.showall.showall-services')->with(['adverts' => $adverts, 'topCategories' => $categories]);
    }

    public function showById($id)
    {
        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {

            Flash::error('Advert not found');

            return redirect(route('service-advert.show-all'));
        }

        $advert = parent::getAdvertDetails($advert);

        return view('displayadverts.byid.show-service')->with(['advert' => $advert]);
    }

    public function showByCategory($category_id)
    {
        $adverts = $this->serviceAdvertByCategory($category_id);

        return view('displayadverts.bycategory.show-services')->with(['adverts' => $adverts]);
    }

}