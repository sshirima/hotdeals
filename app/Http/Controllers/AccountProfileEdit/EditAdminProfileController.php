<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/13/2018
 * Time: 12:15 AM
 */

namespace App\Http\Controllers\AccountProfileEdit;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileAdminRequest;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class EditAdminProfileController extends Controller
{
    private $adminRepo;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->middleware('auth:admin');
        $this->adminRepo = $adminRepository;
    }

    public function edit(){
        return view('editaccountprofiles.admin-profile-edit')->with(['admin'=>auth()->user()]);
    }

    /**
     * @param $id
     * @param UpdateProfileAdminRequest $request
     * @return $this
     */
    public function update($id, UpdateProfileAdminRequest $request){

        $admin = $this->adminRepo->findWithoutFail($id);

        if (empty($admin)){
            Flash::error('Account not found');
        }

        $admin = $this->adminRepo->update($request->all(), $id);

        Flash::success('Admin account updated successfully');

        Auth::setUser($admin);

        return view('showaccountprofiles.admin-profile-show')->with(['admin'=>auth()->user()]);
    }

}