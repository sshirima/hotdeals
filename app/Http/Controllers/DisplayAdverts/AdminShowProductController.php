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

class AdminShowProductController extends ShowAdvertBaseController
{
    /**
     * @var AdvertRepository
     */
    private $advertsRepo;

    /**
     * AdminShowProductController constructor.
     * @param AdvertRepository $advertRepository
     */
    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth:admin');
        $this->advertsRepo = $advertRepository;
    }

    /**
     * @return $this
     */
    public function showAll()
    {
        $admin = auth()->user();

        $adverts = $this->getAdverts(parent::$return_advert_column, ['approved' => false, 'adv_type' => 'Product'], parent::$PAGE_SIZE);

        $adverts = $this->getProductAdvertInfo($adverts);

        return view('displayadverts.showall.admin-showall-products')->with(['admin' => $admin, 'adverts' => $adverts]);
    }

    public function approvedByAdmin($admin)
    {
        $admin = auth()->user();

        $adverts = $this->getAdverts(parent::$return_advert_column,
            ['approved' => true, 'adv_type' => 'Product', 'approved_by' => $admin->email], parent::$PAGE_SIZE);

        $adverts = $this->getProductAdvertInfo($adverts);

        return view('displayadverts.showall.admin-showall-products')->with(['admin' => $admin, 'adverts' => $adverts]);
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showById($id)
    {
        $advert = $this->advertsRepo->find($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('admin.product-advert.show-all'));
        }
        $advert['product'] = $advert->product()->first();

        $advert = parent::getAdvertDetails($advert);

        return view('displayadverts.byid.admin-show-product')->with(['advert' => $advert, 'admin' => auth()->user()]);

    }

}