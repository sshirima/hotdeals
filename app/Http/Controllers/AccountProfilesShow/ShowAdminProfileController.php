<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/12/2018
 * Time: 9:18 PM
 */

namespace App\Http\Controllers\AccountProfilesShow;


class ShowAdminProfileController extends ShowProfileBaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show(){
        return view('showaccountprofiles.admin-profile-show')->with(['admin'=>auth()->user()]);
    }
}