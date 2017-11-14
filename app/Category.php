<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public static $CATEGORY_ID = 'cat_id';
    public static $CATEGORY_NAME = 'cat_name';
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';
}
