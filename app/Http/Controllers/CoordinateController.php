<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 7:33 PM
 */

namespace App\Http\Controllers;


use App\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{

    public function addCoordinate(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'crd_latitude' => '-6.778061',
                'crd_longitude' => '39.260239'
            ]);

        return Coordinate::addCoordinate($request->attributes->all());
    }

    public function updateCoordinate(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'crd_id' => 1,
                'crd_latitude' => '-6.778061',
                'crd_longitude' => '39.260239'
            ]);
        return Coordinate::updateCoordinate($request->attributes->all());
    }

    public function deleteCoordinate()
    {
        return Coordinate::deleteCoordinate(2);
    }
}