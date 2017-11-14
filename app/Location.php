<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public static $LOCATION_ = 'loc_id';
    public static $LOCATION_REGION = 'fk_reg_id';
    public static $LOCATION_COORDINATES = 'fk_crd_id';
    protected $table = 'locations';
    protected $primaryKey = 'loc_id';
}
