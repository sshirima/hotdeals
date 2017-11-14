<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 8:05 PM
 */

namespace App\Http\Controllers;


use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function addLocation(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'fk_reg_id' => 1,
                'fk_crd_id' => 1
            ]);

        return Location::addLocation($request->attributes->all());
    }

    public function updateLocation(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([

                'loc_id' => 1,
                'fk_reg_id' => 2,
                'fk_crd_id' => 1
            ]);

        return Location::updateLocation($request->attributes->all());
    }

    public function deleteLocation()
    {
        return Location::deleteLocation(1);
    }
}