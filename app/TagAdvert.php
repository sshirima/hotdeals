<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagAdvert extends Model
{
    public static $TAG_FK_TAG_ID = 'fk_tag_id';
    public static $TAG_FK_ADVERT_ID = 'fk_adv_id';
    public static $TAG_CREATED_AT = 'created_at';
    public static $TAG_UPDATED_AT = 'updated_at';
    protected $table = 'tags_adverts';
}
