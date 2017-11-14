<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseHandler;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{
    public $timestamps = false;
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';

    public static $CATEGORY_ID = 'cat_id';
    public static $CATEGORY_NAME = 'cat_name';

    /**
     * @param array $params
     * @return array
     */
    public static function addCategory(array $params)
    {
        $response = BaseHandler::addOrThrow(new Category(), $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    /**
     * @param array $params
     * @return array
     */
    public static function updateCategory(array $params)
    {
        $old_category = Category::find($params[Category::$CATEGORY_ID]);

        $response = BaseHandler::updateOrThrow($old_category, $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    /**
     * @param $id
     * @return array
     */
    public static function deleteCategory($id)
    {
        $product = Category::find($id);

        $response = BaseHandler::deleteOrThrow($product);

        return array('response' => $response['response'], 'data' => $response['data']);
    }
}
