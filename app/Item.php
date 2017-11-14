<?php

namespace App;

use App\Exceptions\BaseHandler;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public static $ITEM_ID = 'itm_id';
    public static $ITEM_TYPE = 'itm_type';
    public static $ITEM_PREVIOUS_COST = 'itm_pcost';
    public static $ITEM_CURRENT_COST = 'itm_ccost';
    public static $ITEM_BRAND = 'itm_brand';
    public static $ITEM_FK_CATEGORY_ID = 'fk_cat_id';
    public static $ITEM_FK_ADVERT_ID = 'fk_adv_id';
    public $timestamps = false;
    protected $table = 'items';
    protected $primaryKey = 'itm_id';

    public static function addItem(array $params)
    {
        $response = BaseHandler::addOrThrow(new Item(), $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    public static function updateItem(array $params)
    {
        $old_item = Item::find($params[Item::$ITEM_ID]);

        $response = BaseHandler::updateOrThrow($old_item, $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    public static function deleteItem($id)
    {

        $items = Item::find($id);

        $response = BaseHandler::deleteOrThrow($items);

        return array('response' => $response['response'], 'data' => $response['data']);
    }
}
