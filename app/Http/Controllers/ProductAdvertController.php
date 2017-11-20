<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/16/2017
 * Time: 11:07 PM
 */

namespace App\Http\Controllers;


use App\ProductAdvertManager;
use Illuminate\Http\Request;

class ProductAdvertController extends Controller
{

    public function addProductAdvert(Request $request)
    {
        $request = new Request();

        $request->attributes->add([
            'adv_title' => 'Apple iPhone 7 or 7 Plus 32GB or 128GB Smartphone with (PRODUCT)Red (GSM and CDMA Unlocked) - No Contract Required',
            'adv_description' => '4.7” Retina HD multitouch display, Storage options: 32GB or 128GB',
            'itm_pcost' => 2000,
            'itm_ccost' => 1000,
            'itm_brand' => 'Apple',
            'adv_expiredate' => '2017-11-16',
            'itm_name' => 'Smartphone',
            'pdc_manufacturer' => 'Apple Inc',
            'pdc_model' => 'Iphone 8 plus',
            'fk_cat_id' => 3,
            'fk_reg_id' => 3,
            'fk_slr_id' => 39
        ]);

        return ProductAdvertManager::addProductAdvert($request);
    }

    public function updateProductAdvert(Request $request)
    {
        $request = new Request();

        $request->attributes->add([
            'adv_id' => 21,
            'adv_title' => 'Apple iPhone 7 or 7 Plus 32GB or 128GB Smartphone with (PRODUCT)Red (GSM and CDMA Unlocked) - No Contract Required',
            'adv_description' => '4.7” Retina HD multitouch display, Storage options: 32GB or 128GB',
            'itm_id' => 34,
            'itm_name' => 'Smartphone',
            'itm_pcost' => 2000,
            'itm_ccost' => 1000,
            'adv_expiredate' => '2017-11-16',
            'pdc_id' => 23,
            'pdc_manufacturer' => 'Apple Inc',
            'pdc_model' => 'Iphone 8 plus',
            'fk_cat_id' => 3,
            'fk_reg_id' => 3,
            'fk_slr_id' => 39
        ]);
        return ProductAdvertManager::updateProductAdvert($request);
    }
}