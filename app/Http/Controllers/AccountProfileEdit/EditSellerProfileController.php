<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/13/2018
 * Time: 12:15 AM
 */

namespace App\Http\Controllers\AccountProfileEdit;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileSellerRequest;
use App\Repositories\SellerRepository;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

class EditSellerProfileController extends Controller
{
    private $sellerRepo;

    /**
     * EditSellerProfileController constructor.
     * @param SellerRepository $repository
     */
    public function __construct(SellerRepository $repository)
    {
        $this->middleware('auth:seller');
        $this->sellerRepo = $repository;
    }

    /**
     * @return $this
     */
    public function edit(){
        return view('editaccountprofiles.seller-profile-edit')->with(['seller'=>auth()->user()]);
    }

    /**
     * @param $id
     * @param UpdateProfileSellerRequest $request
     * @return $this
     */
    public function update($id, UpdateProfileSellerRequest $request){
        $admin = $this->sellerRepo->findWithoutFail($id);

        if (empty($admin)){
            Flash::error('Account not found');
        }

        $admin = $this->sellerRepo->update($request->all(), $id);

        Flash::success('Seller account information updated successfully!');

        Auth::setUser($admin);

        return view('showaccountprofiles.seller-profile-show')->with(['seller'=>auth()->user()]);
    }


}