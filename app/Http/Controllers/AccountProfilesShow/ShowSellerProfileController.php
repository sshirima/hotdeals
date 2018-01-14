<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/12/2018
 * Time: 9:18 PM
 */

namespace App\Http\Controllers\AccountProfilesShow;


class ShowSellerProfileController extends ShowProfileBaseController
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function show(){
        return view('showaccountprofiles.seller-profile-show')->with(['seller'=>auth()->user()]);
    }

    public function edit(){

        return view('showaccountprofiles.seller-profile-show')->with(['seller'=>auth()->user()]);
    }

}