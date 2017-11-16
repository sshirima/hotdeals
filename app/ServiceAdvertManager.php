<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/16/2017
 * Time: 1:40 AM
 */

namespace App;


use Illuminate\Http\Request;

class ServiceAdvertManager extends BaseAdvertManager
{

    public static function addServiceAdvert(Request $request)
    {

        $item = self::addAdvertInfo($request);
        //Add service
        return Service::addService($request, $item);
    }

    public static function updateServiceAdvert(Request $request)
    {
        $item = self::updateAdvertInfo($request);
        //Update service
        return Service::updateService($request, $item);
    }
}