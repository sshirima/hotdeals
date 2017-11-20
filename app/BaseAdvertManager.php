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
            ->join('items_locations', 'items.itm_id', '=', 'items_locations.fk_itm_id')
            ->join('locations', 'items_locations.fk_loc_id', '=', 'locations.loc_id')
            ->join('regions', 'locations.fk_reg_id', '=', 'regions.reg_id')
            ->select('adv_id', 'adv_title', 'adv_description', 'adv_expiredate', 'itm_brand', 'itm_pcost', 'itm_ccost', 'reg_name')
            ->get();
    }
}