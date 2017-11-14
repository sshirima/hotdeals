<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public static $RATE_ID = 'rat_id';
    public static $RATE_VALUE = 'rat_value';
    public static $RATE_FK_ADVERT_ID = 'fk_acc_id';
    public static $RATE_FK_ACCOUNT_ID = 'fk_adv_id';
    public static $RATE_CREATED_AT = 'created_at';
    public static $RATE_UPDATED_AT = 'updated_at';
    protected $table = 'rates';
    protected $primaryKey = 'rat_id';
}
