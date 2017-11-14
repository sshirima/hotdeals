<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 7:05 PM
 */

namespace App\Http\Controllers;


use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    public function addRegion(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'reg_name' => 'New-region'
            ]);

        return Region::addRegion($request->attributes->all());
    }

    public function updateRegion(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'reg_id' => 23,
                'reg_name' => 'updated-region'
            ]);

        return Region::updateRegion($request->attributes->all());
    }

    public function deleteRegion()
    {
        return Region::deleteRegion(23);
    }
}