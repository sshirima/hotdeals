<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Account extends BaseModel
{
    //
    public static $TABLENAME = 'accounts';
    public static $ACCOUNT_FIRSTNAME = 'acc_fname';
    public static $ACCOUNT_LASTNAME = 'acc_lname';
    public static $ACCOUNT_EMAIL = 'acc_email';
    public static $ACCOUNT_PASSWORD = 'acc_password';
    public static $ACCOUNT_LOGIN_STATUS = 'acc_login';
    public static $ACCOUNT_ACTIVE = 'acc_active';
    public static $ACCOUNT_CREATED_AT = 'created_at';
    public static $ACCOUNT_UPDATED_AT = 'upadated_at';
    public static $ACCOUNT_ID = 'acc_id';
    public static $ACCOUNT_FK_GROUPID = 'fk_grp_id';
    protected $table = 'accounts';
    protected $primaryKey = 'acc_id';

    public static function fillAccountParams(Request $request, Account $account)
    {

        $account->setAttribute(Account::$ACCOUNT_FK_GROUPID, $request->attributes->get(Account::$ACCOUNT_FK_GROUPID));
        $account->setAttribute(Account::$ACCOUNT_FIRSTNAME, $request->attributes->get(Account::$ACCOUNT_FIRSTNAME));
        $account->setAttribute(Account::$ACCOUNT_LASTNAME, $request->attributes->get(Account::$ACCOUNT_LASTNAME));
        $account->setAttribute(Account::$ACCOUNT_EMAIL, $request->attributes->get(Account::$ACCOUNT_EMAIL));
        $account->setAttribute(Account::$ACCOUNT_PASSWORD, $request->attributes->get(Account::$ACCOUNT_PASSWORD));
        $account->setAttribute(Account::$ACCOUNT_LOGIN_STATUS, $request->attributes->get(Account::$ACCOUNT_LOGIN_STATUS));
        $account->setAttribute(Account::$ACCOUNT_ACTIVE, $request->attributes->get(Account::$ACCOUNT_ACTIVE));
        return $account;
    }
}
