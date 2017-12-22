<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Repositories\AdminRepository;
use App\Repositories\AdvertRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use PragmaRX\Tracker\Vendor\Laravel\Facade as tracker;

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

        return view('admin')->with(['admin' => auth()->user()]);
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
