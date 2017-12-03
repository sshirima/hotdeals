<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Repositories\AdminRepository;
use App\Repositories\AdvertRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class AdminController extends Controller
{
    private $advertsRepo;
    private $adminRepository;

    /**
     * AdminController constructor.
     * @param AdvertRepository $advertRepository
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdvertRepository $advertRepository, AdminRepository $adminRepository)
    {
        $this->middleware('auth:admin');
        $this->advertsRepo = $advertRepository;
        $this->adminRepository = $adminRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = auth()->user();

        $adverts = $this->advertsRepo->findWhere(['approved' => false], ['id', 'title', 'approved', 'expiredate', 'seller_id']);

        foreach ($adverts as $advert) {
            $product = $advert->product()->first();
            $image = $advert->images()->first();
            $location = $advert->location()->first();
            $region = $location->region()->first();

            $advert['brand'] = $product->brand;
            $advert['p_cost'] = $product->p_cost;
            $advert['c_cost'] = $product->c_cost;
            $advert['img_name'] = $image->img_name;
            $advert['reg_name'] = $region->reg_name;
        }

        return view('admin')->with(['admin' => $admin, 'adverts' => $adverts]);
    }

    public function productAdvertShow($id)
    {

        $advert = $this->advertsRepo->find($id);
        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('admin.dashboard'));
        }
        $advert['product'] = $advert->product()->first();
        $location = $advert->location()->first();
        $location['region'] = $location->region()->first();
        $advert['images'] = $advert->images()->get();
        $advert['categories'] = $advert->categories()->get();
        $advert['location'] = $location;

        return view('product_advert.show-admin')->with(['advert' => $advert, 'admin' => auth()->user()]);
    }

    public function approveAdvert($id)
    {
        $advert = $this->advertsRepo->find($id);
        $admin = auth()->user();
        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('seller.dashboard'));
        }
        $advert->approved = true;
        $advert->approveddate = Carbon::now();
        $advert->approved_by = $admin->email;
        $advert->save();

        return redirect(route('admin.dashboard'));
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'approveddate'
    ];

    public function confirmDestroy($id)
    {
        $adminToDelete = DB::table('admins')->find($id);
        return view('users.admins.confirm-delete')->with(['admin' => auth()->user(), 'adminToDelete' => $adminToDelete]);
    }

    public function destroy($id)
    {

        if (true) {
            Flash::error('You are not authorized to delete user');

            return redirect(route('accounts.admins.index'));
        }

        $adminToDelete = $this->adminRepository->findWithoutFail($id);

        if (empty($adminToDelete)) {
            Flash::error('Account not found');

            return redirect(route('accounts.admins.index'));
        }

        $this->adminRepository->delete($id);

        Flash::success('Account deleted successfully.');

        return redirect(route('accounts.admins.index'));
    }
}
