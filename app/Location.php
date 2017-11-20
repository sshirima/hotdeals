<?php

namespace App;

use App\Exceptions\BaseHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class Location
 * @package App
 */
class Location extends BaseModel
{
    //
    public $timestamps = false;
    protected $table = 'locations';
    protected $primaryKey = 'loc_id';

    public static $LOCATION_ID = 'loc_id';
    public static $LOCATION_REGION = 'fk_reg_id';
    public static $LOCATION_COORDINATES = 'fk_crd_id';

    public static function addLocation(Request $request, $item)
    {
        if ($item['response']->code == 'OK') {
            $location_params = BaseHandler::getParametersFromRequest($request, array(self::$LOCATION_REGION));
            return Location::addModel(new Location(), $location_params);
        } else {
            return $item;
        }
    }
}
