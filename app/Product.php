<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseHandler;

class Product extends BaseModel
{
    public $timestamps = false;
    protected $table = 'products';
    protected $primaryKey = 'pdc_id';

    public static $PRODUCT_ID = 'pdc_id';
    public static $PRODUCT_NAME = 'pdc_name';
    public static $PRODUCT_MANUFACTURER = 'pdc_manufacturer';
    public static $PRODUCT_MODEL = 'slr_model';
    public static $PRODUCT_FK_ITEM_ID = 'fk_itm_id';

}
