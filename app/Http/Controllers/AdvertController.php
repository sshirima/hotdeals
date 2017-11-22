<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/13/2017
 * Time: 5:34 PM
 */

namespace App\Http\Controllers;


use App\BaseAdvertManager;
use App\AdvertPublisher;

class AdvertController extends Controller
{
    public function getAdvertsAll()
    {
        return null;
        //$adverts = BaseAdvertManager::getAllAdverts();
        //return ['adverts'=>AdvertPublisher::threeColumnsOutput($adverts)];
        //return view('home', ['adverts_rows' => AdvertPublisher::threeColumnsOutput($adverts)]);
    }
}