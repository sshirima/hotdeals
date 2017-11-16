<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseHandler;
use Illuminate\Http\Request;

class Product extends BaseModel
{
    public $timestamps = false;
    protected $table = 'products';
    protected $primaryKey = 'pdc_id';

    public static $PRODUCT_ID = 'pdc_id';
    public static $PRODUCT_NAME = 'pdc_name';
    public static $PRODUCT_MANUFACTURER = 'pdc_manufacturer';
    public static $PRODUCT_MODEL = 'pdc_model';
    public static $PRODUCT_FK_ITEM_ID = 'fk_itm_id';

    public static function addProduct(Request $request, $item)
    {
        if ($item['response']->code == 'OK') {
            $product_params = BaseHandler::getParametersFromRequest($request, array(self::$PRODUCT_MANUFACTURER,
                self::$PRODUCT_MODEL));

            $product_params[Product::$PRODUCT_FK_ITEM_ID] = $item['data'][Item::$ITEM_ID];

            return Product::addModel(new Product(), $product_params);
        } else {
            return $item;
        }
    }

    public static function updateProduct(Request $request, $item)
    {
        if ($item['response']->code == 'OK') {

            $product_params = BaseHandler::getParametersFromRequest($request, array(self::$PRODUCT_ID,
                self::$PRODUCT_MANUFACTURER, self::$PRODUCT_MODEL));

            $product = self::findModelById($product_params[self::$PRODUCT_ID], Product::class);

            if ($product instanceof Service) {
                $product_params[self::$PRODUCT_FK_ITEM_ID] = $item['data'][Item::$ITEM_ID];
                return Product::updateModel($product, $product_params);
            } else {
                return $product;
            }
        } else {
            return $item;
        }
    }

}
