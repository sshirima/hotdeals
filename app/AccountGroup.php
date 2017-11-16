<?php

namespace App;

use Illuminate\Support\Facades\DB;

class AccountGroup extends BaseModel
{
    //
    public static $DEFAULT_LEVEL_ADMIN = 1;
    public static $DEFAULT_LEVEL_SELLER = 2;
    public static $DEFAULT_LEVEL_AUTHORIZER = 3;
    public static $DEFAULT_LEVEL_ONLINE_USER = 4;
    public static $TABLE_NAME = 'accountgroups';
    public static $ACCOUNT_GROUP_NAME = 'grp_name';
    public static $ACCOUNT_GROUP_DESCRIPTION = 'grp_description';
    public static $ACCOUNT_GROUP_ID = 'grp_id';
    public static $ACCOUNT_GROUP_LEVEL = 'grp_level';
    public static $CREATED_AT = 'created_at';
    public static $UPDATED_AT = 'updated_at';
    protected $table = 'accountgroups';
    protected $primaryKey = 'grp_id';

    public static function getGroupIdByLevel($level)
    {
        $results = DB::table(AccountGroup::$TABLE_NAME)->select(AccountGroup::$ACCOUNT_GROUP_ID)
            ->where(AccountGroup::$ACCOUNT_GROUP_LEVEL, '=', $level)->get();
        return $results[0]->grp_id;
    }
}
