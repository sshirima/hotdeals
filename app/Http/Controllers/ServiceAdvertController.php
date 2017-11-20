<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/16/2017
 * Time: 12:01 AM
 */

namespace App\Http\Controllers;


use App\ServiceAdvertManager;
use Illuminate\Http\Request;

class ServiceAdvertController extends Controller
{

    public function addServiceAdvert(Request $request)
    {

        $request = new Request();

        $request->attributes->add([
            'adv_title' => 'Hotel at a Glance: Kalahari Resorts & Conventions',
            'adv_description' => 'World-class instructors designed these kickboxing classes to increase energy, maximize weight loss, and foster a fun...',
            'itm_brand' => 'Azura health fitness',
            'itm_name' => 'Hotel services',
            'itm_pcost' => 2000,
            'itm_ccost' => 1000,
            'adv_expiredate' => '2017-11-16',
            'fk_cat_id' => 2,
            'fk_reg_id' => 3,
            'fk_slr_id' => 39
        ]);

        return ServiceAdvertManager::addServiceAdvert($request);
    }

    public function updateServiceAdvert(Request $request)
    {
        $request = new Request();

        $request->attributes->add([
            'adv_id' => 12,
            'adv_title' => 'Hotel at 50% off cost',
            'adv_description' => 'Get hotels at cheap price rate',
            'adv_approved' => true,
            'adv_expiredate' => '2017-11-16',
            'itm_id' => 23,
            'itm_name' => 'Hotel services',
            'itm_pcost' => 2000,
            'itm_ccost' => 1000,
            'itm_brand' => 'Azura health fitness',
            'srv_id' => 14,
            'fk_cat_id' => 2,
            'fk_reg_id' => 3,
            'fk_slr_id' => 39
        ]);

        return ServiceAdvertManager::updateServiceAdvert($request);
    }
}