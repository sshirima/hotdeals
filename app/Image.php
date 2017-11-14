<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public static $IMAGE_ID = 'img_id';
    public static $IMAGE_PATH = 'img_path';
    public static $IMAGE_NAME = 'img_name';
    public static $IMAGE_HEIGHT = 'img_height';
    public static $IMAGE_WIDTH = 'img_width';
    public static $IMAGE_FK_ITEM_ID = 'fk_itm_id';
    protected $table = 'images';
    protected $primaryKey = 'img_id';
}
