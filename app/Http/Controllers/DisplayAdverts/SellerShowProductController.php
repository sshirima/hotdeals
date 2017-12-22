<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/13/2017
 * Time: 9:20 PM
 */

namespace App\Http\Controllers\DisplayAdverts;

use App\AdvertManager;
use App\Repositories\AdvertRepository;
use Laracasts\Flash\Flash;

class SellerShowProductController extends ShowAdvertBaseController
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
    }

    public function showAll()
    {
        $seller = auth()->user();

        $adverts = $this->getAdverts(parent::$return_advert_column, ['seller_id' => $seller->id, 'adv_type' => 'Product'], parent::$PAGE_SIZE);
        $adverts = $this->getProductAdvertInfo($adverts);

        return view('displayadverts.showall.seller-showall-products')->with(['seller' => $seller, 'adverts' => $adverts]);

    }

    public function showByStatus($status)
    {
        $seller = auth()->user();
        $adverts = $this->getAdverts(parent::$return_advert_column, ['seller_id' => $seller->id, 'adv_type' => 'Product', 'approved' => $status], parent::$PAGE_SIZE);
        $adverts = $this->getProductAdvertInfo($adverts);

        return view('displayadverts.showall.seller-showall-products')->with(['seller' => $seller, 'adverts' => $adverts]);

    }

    public function showById($id)
    {
        $advert = $this->advertsRepo->find($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('admin.dashboard'));
        }
        $advert['product'] = $advert->product()->first();
        $advert = parent::getAdvertDetails($advert);

        return view('displayadverts.byid.seller-show-product')->with(['advert' => $advert, 'seller' => auth()->user()]);
    }

}