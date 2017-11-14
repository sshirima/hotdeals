<?php

namespace App;

/**
 * Class Comment
 * @package App
 */
class Comment extends BaseModel
{
    protected $table = 'comments';
    protected $primaryKey = 'com_id';

    public static $COMMENT_ID = 'com_id';
    public static $COMMENT_CONTENT = 'com_contents';
    public static $COMMENT_FK_ADVERT_ID = 'fk_adv_id';
    public static $COMMENT_FK_ACCOUNT_ID = 'fk_acc_id';
    public static $COMMENT_CREATED_AT = 'created_at';
    public static $COMMENT_UPDATED_AT = 'updated_at';

}
