<?php

namespace App;

use App\Exceptions\BaseHandler;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Coordinate
 * @package App
 */
class Coordinate extends BaseModel
{
    public static $COORDINATE_ID = 'crd_id';
    public static $COORDINATE_LATITUDE = 'crd_latitude';
    public static $COORDINATE_LONGITUDE = 'crd_longitude';
    public $timestamps = false;
    protected $table = 'coordinates';
    protected $primaryKey = 'crd_id';
}
