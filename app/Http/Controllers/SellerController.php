<?php

use App\Exceptions\BaseHandler;
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/12/2017
 * Time: 12:18 AM
 */

namespace App\Http\Controllers;

use App\AccountManager;
use App\Seller;
use App\Response;
use Illuminate\Http\Request;


class SellerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller');
    }
}