<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public static $TAG_ID = 'tag_id';
    public static $TAG_WORDS = 'tag_name';
    public static $TAG_CREATED_AT = 'created_at';
    public static $TAG_UPDATED_AT = 'updated_at';
    protected $table = 'tags';
    protected $primaryKey = 'tag_id';
}
