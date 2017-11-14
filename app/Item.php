<?php

namespace App;

class Item extends BaseModel
{
    public $timestamps = false;
    protected $table = 'items';
    protected $primaryKey = 'itm_id';

    public static $ITEM_ID = 'itm_id';
    public static $ITEM_TYPE = 'itm_type';
    public static $ITEM_PREVIOUS_COST = 'itm_pcost';
    public static $ITEM_CURRENT_COST = 'itm_ccost';
    public static $ITEM_BRAND = 'itm_brand';
    public static $ITEM_FK_CATEGORY_ID = 'fk_cat_id';
    public static $ITEM_FK_ADVERT_ID = 'fk_adv_id';



}
