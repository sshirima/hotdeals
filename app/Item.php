<?php

namespace App;

use Illuminate\Http\Request;

class Item extends BaseModel
{
    public $timestamps = false;
    protected $table = 'items';
    protected $primaryKey = 'itm_id';

    public static $ITEM_TYPE_SERVICE = 'SERVICE';
    public static $ITEM_TYPE_PRODUCT = 'PRODUCT';
    public static $ITEM_ID = 'itm_id';
    public static $ITEM_TYPE = 'itm_type';
    public static $ITEM_PREVIOUS_COST = 'itm_pcost';
    public static $ITEM_CURRENT_COST = 'itm_ccost';
    public static $ITEM_BRAND = 'itm_brand';
    public static $ITEM_FK_CATEGORY_ID = 'fk_cat_id';
    public static $ITEM_FK_ADVERT_ID = 'fk_adv_id';

    public static function addItem(Request $request, $advert)
    {
        if ($advert['response']->code == 'OK') {
            $item_params = self::getParamsFromRequest($request, true);
            $item_params[self::$ITEM_FK_ADVERT_ID] = $advert['data'][Advert::$ADVERT_ID];

            $item = Item::addModel(new Item(), $item_params);
            ItemLocation::addItemLocation($request, $item);
            return $item;
        } else {
            return $advert;
        }
    }

    /**
     * @param Request $request
     * @param $advert
     * @return array
     */
    public static function updateItem(Request $request, $advert)
    {
        if ($advert['response']->code == 'OK') {
            $item_params = self::getParamsFromRequest($request, false);
            $item = self::findModelById($item_params[self::$ITEM_ID], Item::class);

            if ($item instanceof Item) {
                $item_params[self::$ITEM_FK_ADVERT_ID] = $advert['data'][Advert::$ADVERT_ID];
                return Item::updateModel($item, $item_params);
            } else {
                return $item;
            }
        } else {
            return $advert;
        }
    }

    public static function deleteItem($id)
    {

    }

    private static function getParamsFromRequest(Request $request, $isnew)
    {
        $user_params = $request->attributes->all();
        if ($isnew) {
            return array(
                self::$ITEM_TYPE => self::$ITEM_TYPE_SERVICE,
                self::$ITEM_PREVIOUS_COST => $user_params[self::$ITEM_PREVIOUS_COST],
                self::$ITEM_CURRENT_COST => $user_params[self::$ITEM_CURRENT_COST],
                self::$ITEM_BRAND => $user_params[self::$ITEM_BRAND],
                self::$ITEM_FK_CATEGORY_ID => $user_params[self::$ITEM_FK_CATEGORY_ID]
            );
        } else {
            return array(
                self::$ITEM_ID => $user_params[self::$ITEM_ID],
                self::$ITEM_TYPE => self::$ITEM_TYPE_SERVICE,
                self::$ITEM_PREVIOUS_COST => $user_params[self::$ITEM_PREVIOUS_COST],
                self::$ITEM_CURRENT_COST => $user_params[self::$ITEM_CURRENT_COST],
                self::$ITEM_BRAND => $user_params[self::$ITEM_BRAND],
                self::$ITEM_FK_CATEGORY_ID => $user_params[self::$ITEM_FK_CATEGORY_ID]
            );
        }
    }

}
