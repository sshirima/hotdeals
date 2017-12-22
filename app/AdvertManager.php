<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/9/2017
 * Time: 10:14 PM
 */

namespace App;


use App\Models\Comment;
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
        $advert['comments'] = $advert->comments()->get();

        foreach ($advert['comments'] as $comment) {
            $comment['posted_at'] = Comment::getTimeDifference(new \DateTime($comment->created_at));
            $comment['user'] = $comment->user()->select(['first_name', 'last_name'])->first();
        }

        $advert['rate'] = $advert->rates()->avg('value');

        return $advert;
    }

    public static function getByCategory($id)
    {
        return DB::table('advert_category')->select('adverts.id', 'adverts.title', 'expiredate')
            ->join('adverts', 'adverts.id', '=', 'advert_category.advert_id')
            ->where('advert_category.category_id', '=', $id)->get();
    }
}