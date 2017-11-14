<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseHandler;

class Service extends BaseModel
{
    public $timestamps = false;
    protected $table = 'services';
    protected $primaryKey = 'srv_id';

    public static $SERVICE_ID = 'srv_id';
    public static $SERVICE_FK_ITEM_ID = 'fk_itm_id';

}
