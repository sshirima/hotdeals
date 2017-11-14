<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static $COMMENT_ID = 'rat_id';
    public static $COMMENT_CONTENT = 'rat_contents';
    public static $COMMENT_FK_ADVERT_ID = 'fk_adv_id';
    public static $COMMENT_FK_ACCOUNT_ID = 'fk_acc_id';
    public static $COMMENT_CREATED_AT = 'created_at';
    public static $COMMENT_UPDATED_AT = 'updated_at';
    protected $table = 'comments';
    protected $primaryKey = 'com_id';
}
