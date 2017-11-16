<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/16/2017
 * Time: 11:13 PM
 */

namespace App;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseAdvertManager
{

    public static function addAdvertInfo(Request $request)
    {
        //Add advert
        $advert = Advert::addAdvert($request);
        //Add item
        return Item::addItem($request, $advert);
    }

    public static function updateAdvertInfo(Request $request)
    {
        //Update advert
        $advert = Advert::updateAdvert($request);
        //Update item
        return Item::updateItem($request, $advert);
    }

    public static function getAllAdverts()
    {
        return DB::table('adverts')
            ->join('items', 'items.fk_adv_id', '=', 'adverts.adv_id')
            ->select('*')
            ->get();
    }
}