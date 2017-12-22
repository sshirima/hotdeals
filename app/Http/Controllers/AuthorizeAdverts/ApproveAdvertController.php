<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/14/2017
 * Time: 8:28 PM
 */

namespace App\Http\Controllers\AuthorizeAdverts;


use App\Http\Controllers\Controller;
use App\Repositories\AdvertRepository;
use Carbon\Carbon;
use Laracasts\Flash\Flash;

class ApproveAdvertController extends Controller
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth:admin');
        $this->advertsRepo = $advertRepository;
    }

    public function approveProduct($id)
    {
        $advert = $this->advertsRepo->find($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('admin.product-advert.show-all'));
        }
        $this->approve($advert, auth()->user());

        return redirect(route('admin.product-advert.show-all'));
    }

    private function approve($advert, $admin)
    {
        $advert->approved = true;
        $advert->approveddate = Carbon::now();
        $advert->approved_by = $admin->email;
        $advert->save();
    }

    public function approveService($id)
    {
        $advert = $this->advertsRepo->find($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('admin.service-advert.show-all'));
        }

        $this->approve($advert, auth()->user());

        return redirect(route('admin.service-advert.show-all'));
    }

}