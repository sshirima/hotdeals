<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/16/2017
 * Time: 11:07 PM
 */

namespace App;


use Illuminate\Http\Request;

class ProductAdvertManager extends BaseAdvertManager
{

    public static function addProductAdvert(Request $request)
    {
        $item = self::addAdvertInfo($request);

        //Add product
        return Product::addProduct($request, $item);
    }

    public static function updateProductAdvert(Request $request)
    {
        $item = self::updateAdvertInfo($request);

        //Update product
        return Product::updateProduct($request, $item);
    }
}