<?php

namespace App;

class Tag extends BaseModel
{
    protected $table = 'tags';
    protected $primaryKey = 'tag_id';

    public static $TAG_ID = 'tag_id';
    public static $TAG_WORDS = 'tag_name';
    public static $TAG_CREATED_AT = 'created_at';
    public static $TAG_UPDATED_AT = 'updated_at';

}
