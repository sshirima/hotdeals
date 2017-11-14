<?php

namespace App;

use App\Exceptions\BaseHandler;
use Illuminate\Database\Eloquent\Model;

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
}
