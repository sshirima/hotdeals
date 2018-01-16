<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/13/2017
 * Time: 10:58 PM
 */

namespace App\Http\Controllers\DisplayAdverts;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class ShowAdvertBaseController extends Controller
{
    public static $return_advert_column = ['id', 'title', 'approved', 'expiredate', 'seller_id'];

    public static $PAGE_SIZE = 11;

    /**
     * Get details of the advert
     * @param $advert
     * @return mixed
     */
    public static function getAdvertDetails($advert)
    {
        $location = $advert->location()->first();
        $location['region'] = $location->region()->first();
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

    public function getTopCategories($advertType, $limit)
    {
        return DB::table('advert_category')
            ->select('categories.id', 'categories.cat_name', DB::raw('COUNT(advert_category.category_id) as occurrences'))
            ->join('categories', 'categories.id', '=', 'advert_category.category_id')
            ->where('categories.cat_type', '=', $advertType)
            ->groupBy('categories.id', 'categories.cat_name')
            ->orderBy('occurrences', 'DESC')
            ->limit($limit)
            ->get();
    }

    public function getAdverts($columns, $conditions, $page_size)
    {
        return Advert::select($columns)
            ->where($conditions)
            ->orderBy('id', 'desc')
            ->paginate($page_size);
    }

    public function getProductAdvertInfo($adverts)
    {
        foreach ($adverts as $advert) {
            $this->getAdvertBasicInfo($advert, $advert->product()->first());
        }
        return $adverts;
    }

    /**
     * @param $advert
     * @param $item
     * @return mixed
     */
    public static function getAdvertBasicInfo($advert, $item)
    {

        $image = $advert->images()->first();
        $location = $advert->location()->first();
        $region = $location->region()->first();

        $advert['brand'] = $item->brand;
        $advert['p_cost'] = $item->p_cost;
        $advert['c_cost'] = $item->c_cost;
        $advert['img_name'] = $image->img_name;
        $advert['reg_name'] = $region->reg_name;

        return $advert;
    }

    public function getServiceAdvertInfo($adverts)
    {
        foreach ($adverts as $advert) {
            $this->getAdvertBasicInfo($advert, $advert->service()->first());
        }
        return $adverts;
    }

    public function serviceAdvertByCategory($category_id)
    {
        $category = Category::find($category_id);

        $adverts = $category->adverts()->select(ShowAdvertBaseController::$return_advert_column)
            ->where(['approved' => true, 'adv_type' => 'Service'])
            ->orderBy('id', 'desc')->paginate(5);;

        $this->getServiceAdvertInfo($adverts);

        return $adverts;
    }

    public function productAdvertByCategory($category_id)
    {
        $category = Category::find($category_id);

        $adverts = $category->adverts()->select(ShowAdvertBaseController::$return_advert_column)
            ->where(['approved' => true, 'adv_type' => 'Product'])
            ->orderBy('id', 'desc')->paginate(5);

        $adverts = $this->getProductAdvertInfo($adverts);

        return $adverts;
    }

    public static function getProductAdvertById($id){
        $advert = Advert::find($id);
        if (empty($advert)){
            return false;
        }
        $advert['product'] = $advert->product()->first();
        $advert = self::getAdvertDetails($advert);
        return $advert;
    }

    public static function getServiceAdvertById($id){
        $advert = Advert::find($id);
        if (empty($advert)){
            return false;
        }
        $advert['service'] = $advert->service()->first();
        $advert = self::getAdvertDetails($advert);
        return $advert;
    }
}