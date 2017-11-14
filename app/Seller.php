<?php

namespace App;


class Seller extends BaseModel
{
    public static $SELLER_ID = 'slr_id';
    public static $SELLER_PHONENUMBER = 'slr_phonenumber';
    public static $SELLER_FK_ACC_ID = 'fk_acc_id';
    public $timestamps = false;
    protected $table = 'sellers';
    protected $primaryKey = 'slr_id';
}



