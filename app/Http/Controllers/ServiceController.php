<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 12:39 AM
 */

namespace App\Http\Controllers;


use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function addService(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add(['fk_itm_id' => 9
            ]);
        return Service::addService($request->attributes->all());
    }

    public function updateService(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'srv_id' => 1,
                'fk_itm_id' => 10
            ]);
        return Service::updateService($request->attributes->all());
    }

    public function deleteService()
    {
        return Service::deleteService(1);
    }
}