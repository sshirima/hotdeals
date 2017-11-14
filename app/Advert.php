<?php

namespace App;

/**
 * Class Advert
 * @package App
 */
class Advert extends BaseModel
{
    //
    public static $ADVERT_ID = 'adv_id';
    public static $ADVERT_TITLE = 'adv_title';
    public static $ADVERT_DESCRIPTION = 'adv_description';
    public static $ADVERT_EXPIRE_DATE = 'adv_expiredate';
    public static $ADVERT_APPROVED_DATE = 'adv_approveddate';
    public static $ADVERT_APPROVED = 'adv_approved';
    public static $ADVERT_FK_SELLER_ID = 'fk_slr_id';
    public static $ADVERT_CREATED_AT = 'created_at';
    public static $ADVERT_UPDATED_AT = 'updated_at';
    protected $table = 'adverts';
    protected $primaryKey = 'adv_id';
}
