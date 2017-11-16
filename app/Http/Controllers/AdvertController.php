<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/13/2017
 * Time: 5:34 PM
 */

namespace App\Http\Controllers;


use App\Advert;
use App\BaseAdvertManager;
use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function getAdvertsAll()
    {
        return BaseAdvertManager::getAllAdverts();
    }
}