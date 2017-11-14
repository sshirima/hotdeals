<?php

namespace App;

use App\Exceptions\BaseHandler;
use Illuminate\Database\Eloquent\Model;

class Region extends BaseModel
{
    public static $REGION_ID = 'reg_id';
    public static $REGION_NAME = 'reg_name';
    public $timestamps = false;
    protected $table = 'regions';
    protected $primaryKey = 'reg_id';
}
