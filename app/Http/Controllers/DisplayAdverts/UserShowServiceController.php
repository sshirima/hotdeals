<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/13/2017
 * Time: 9:20 PM
 */

namespace App\Http\Controllers\DisplayAdverts;


use App\Http\Controllers\Controller;
use App\Repositories\AdvertRepository;
use Laracasts\Flash\Flash;

class UserShowServiceController extends ShowAdvertBaseController
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth');
        $this->advertsRepo = $advertRepository;
    }

    public function showAll()
    {
        $adverts = $this->getAdverts(ShowAdvertBaseController::$return_advert_column, ['approved' => true, 'adv_type' => 'Service'], 5);

        $this->getServiceAdvertInfo($adverts);

        $categories = parent::getTopCategories('Service', 10);

        return view('displayadverts.showall.user-showall-services')->with(['adverts' => $adverts, 'user' => auth()->user(), 'topCategories' => $categories]);
    }

    public function showById($id)
    {
        $advert = $this->advertsRepo->find($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('user.service-advert.show-all'));
        }

        $advert = parent::getAdvertDetails($advert);

        return view('displayadverts.byid.user-show-service')->with(['advert' => $advert, 'user' => auth()->user()]);
    }

    public function showByCategory($category_id)
    {
        $adverts = $this->serviceAdvertByCategory($category_id);

        return view('displayadverts.bycategory.user-show-services')->with(['adverts' => $adverts]);
    }
}