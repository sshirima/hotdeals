<?php

namespace App;

use Illuminate\Http\Request;

class ItemLocation extends BaseModel
{
    public $timestamps = false;
    protected $table = 'items_locations';

    public static $ITEM_ID = 'fk_itm_id';
    public static $LOCATION_ID = 'fk_loc_id';

    public static function addItemLocation(Request $request, $item)
    {

        $location = Location::addLocation($request, $item);

        if ($location['response']->code == 'OK') {
            $itemloc_params = array();
            $itemloc_params[self::$ITEM_ID] = $item['data'][Item::$ITEM_ID];
            $itemloc_params[self::$LOCATION_ID] = $location['data'][Location::$LOCATION_ID];

            return ItemLocation::addModel(new ItemLocation(), $itemloc_params);
        } else {
            return $item;
        }
    }
}
