<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/9/2017
 * Time: 10:14 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class AdvertManager
{

    /**
     * Get few information about the adverts
     * @param $adverts
     * @return mixed
     */
    public static function getAdvertInfo($adverts)
    {
        foreach ($adverts as $advert) {
            $product = $advert->product()->first();
            $image = $advert->images()->first();
            $location = $advert->location()->first();
            $region = $location->region()->first();

            $advert['brand'] = $product->brand;
            $advert['p_cost'] = $product->p_cost;
            $advert['c_cost'] = $product->c_cost;
            $advert['img_name'] = $image->img_name;
            $advert['reg_name'] = $region->reg_name;
        }
        return $adverts;
    }

    /**
     * Get details of the advert
     * @param $advert
     * @return mixed
     */
    public static function getAdvertDetails($advert)
    {
        $advert['product'] = $advert->product()->first();
        $location = $advert->location()->first();
        $location['region'] = $location->region()->first();
        $advert['images'] = $advert->images()->get();
        $advert['categories'] = $advert->categories()->get();
        $advert['location'] = $location;
        return $advert;
    }

    public static function getByCategory($id)
    {
        return DB::table('advert_category')->select('adverts.id', 'adverts.title', 'expiredate')
            ->join('adverts', 'adverts.id', '=', 'advert_category.advert_id')
            ->where('advert_category.category_id', '=', $id)->get();
    }
}