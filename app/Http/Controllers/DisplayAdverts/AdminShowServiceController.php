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

class AdminShowServiceController extends ShowAdvertBaseController
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth:admin');
        $this->advertsRepo = $advertRepository;
    }

    public function showAll()
    {
        $admin = auth()->user();

        $adverts = $this->getAdverts(parent::$return_advert_column, ['approved' => false, 'adv_type' => 'Service'], parent::$PAGE_SIZE);

        $adverts = $this->getServiceAdvertInfo($adverts);

        return view('displayadverts.showall.admin-showall-services')->with(['admin' => $admin, 'adverts' => $adverts]);
    }

    public function approvedByAdmin($admin)
    {
        $admin = auth()->user();

        $adverts = $this->getAdverts(parent::$return_advert_column,
            ['approved' => true, 'adv_type' => 'Service', 'approved_by' => $admin->email], parent::$PAGE_SIZE);

        $adverts = $this->getServiceAdvertInfo($adverts);

        return view('displayadverts.showall.admin-showall-services')->with(['admin' => $admin, 'adverts' => $adverts]);
    }

    public function showById($id)
    {
        $advert = $this->advertsRepo->find($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('admin.service-advert.show-all'));
        }
        $advert['service'] = $advert->service()->first();

        $advert = parent::getAdvertDetails($advert);

        return view('displayadverts.byid.admin-show-service')->with(['advert' => $advert, 'admin' => auth()->user()]);
    }

}