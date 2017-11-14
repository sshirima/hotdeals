<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseHandler;

class Product extends Model
{
    public static $PRODUCT_ID = 'pdc_id';
    public static $PRODUCT_NAME = 'pdc_name';
    public static $PRODUCT_MANUFACTURER = 'pdc_manufacturer';
    public static $PRODUCT_MODEL = 'slr_model';
    public static $PRODUCT_FK_ITEM_ID = 'fk_itm_id';
    public $timestamps = false;
    protected $table = 'products';
    protected $primaryKey = 'pdc_id';

    /**
     * @param array $params
     * @return array
     */
    public static function addProduct(array $params)
    {
        $response = BaseHandler::addOrThrow(new Product(), $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    /**
     * @param array $params
     * @return array
     */
    public static function updateProduct(array $params)
    {
        $old_product = Product::find($params[Product::$PRODUCT_ID]);

        $response = BaseHandler::updateOrThrow($old_product, $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    /**
     * @param $id
     * @return array
     */
    public static function deleteProduct($id)
    {
        $product = Product::find($id);

        $response = BaseHandler::deleteOrThrow($product);

        return array('response' => $response['response'], 'data' => $response['data']);
    }
}
