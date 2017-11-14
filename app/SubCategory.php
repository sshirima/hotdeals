<?php

namespace App;

class SubCategory extends BaseModel
{
    public static $SUBCATEGORY_ID = 'subcat_id';
    public static $SUBCATEGORY_NAME = 'subcat_name';
    public $timestamps = false;
    protected $table = 'subcategories';
    protected $primaryKey = 'subcat_id';
}
