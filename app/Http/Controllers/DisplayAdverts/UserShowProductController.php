<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/13/2017
 * Time: 9:20 PM
 */

namespace App\Http\Controllers\DisplayAdverts;

use App\Repositories\AdvertRepository;
use Laracasts\Flash\Flash;

class UserShowProductController extends ShowAdvertBaseController
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth');
        $this->advertsRepo = $advertRepository;
    }

    /**
     * @return $this
     */
    public function showAll()
    {
        $adverts = $this->getAdverts(parent::$return_advert_column, ['approved' => true, 'adv_type' => 'Product'], parent::$PAGE_SIZE);

        $adverts = $this->getProductAdvertInfo($adverts);

        $categories = parent::getTopCategories('Product', 10);

        return view('displayadverts.showall.user-showall-products')->with(['adverts' => $adverts, 'user' => auth()->user(), 'topCategories' => $categories]);
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

            return redirect(route('user.product-advert.show-all'));
        }

        $advert = parent::getAdvertDetails($advert);

        return view('displayadverts.byid.user-show-product')->with(['advert' => $advert, 'user' => auth()->user()]);
    }

}