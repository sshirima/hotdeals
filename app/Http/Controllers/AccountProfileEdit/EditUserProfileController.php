<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/13/2018
 * Time: 12:16 AM
 */

namespace App\Http\Controllers\AccountProfileEdit;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileUserRequest;
use App\Repositories\UserRepository;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

class EditUserProfileController extends Controller
{
    private $userRepo;


    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth');
        $this->userRepo = $repository;
    }

    public function edit(){
        return view('editaccountprofiles.user-profile-edit')->with(['user'=>auth()->user()]);
    }

    public function update($id, UpdateProfileUserRequest $request){
        $admin = $this->userRepo->findWithoutFail($id);

        if (empty($admin)){
            Flash::error('Account not found');
        }

        $admin = $this->userRepo->update($request->all(), $id);

        Flash::success('User account information updated successfully');

        Auth::setUser($admin);

        return view('showaccountprofiles.user-profile-show')->with(['user'=>auth()->user()]);
    }

}