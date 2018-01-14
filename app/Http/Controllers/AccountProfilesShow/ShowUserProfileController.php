<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/12/2018
 * Time: 9:18 PM
 */

namespace App\Http\Controllers\AccountProfilesShow;


class ShowUserProfileController extends ShowProfileBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        return view('showaccountprofiles.user-profile-show')->with(['user'=>auth()->user()]);
    }

}