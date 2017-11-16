<?php

namespace App;

use Illuminate\Http\Request;
use App\Exceptions\BaseHandler;

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

    /**
     * @param Request $request
     * @return array
     */
    public static function addAccount(Request $request)
    {
        //Get user input values from the request
        $account_params = Account::getParamsFromRequest($request, true);

        //Get ID of the seller group
        $account_params[Account::$ACCOUNT_FK_GROUPID] = AccountGroup::getGroupIdByLevel(AccountGroup::$DEFAULT_LEVEL_SELLER);

        return Account::addModel(new Account(), $account_params);
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function updateAccount(Request $request)
    {
        //Get user input values from the request
        $account_params = Account::getParamsFromRequest($request, false);

        $account = self::getAccountById($account_params[Account::$ACCOUNT_ID]);

        if ($account instanceof Account) {

            $account_params[Account::$ACCOUNT_FK_GROUPID] = $account[self::$ACCOUNT_FK_GROUPID];

            $response = Account::updateModel($account, $account_params);
        } else {
            $response = $account;
        }

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function deleteAccount($id)
    {

        $account = self::getAccountById($id);

        $account instanceof Account ? $response = Account::deleteModel($account) : $response = $account;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getAccountById($id)
    {

        try {
            return Account::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }

    /**
     * @param Request $request
     * @param $isnew
     * @return array
     */
    public static function getParamsFromRequest(Request $request, $isnew)
    {
        $user_params = $request->attributes->all();
        if ($isnew) {
            return array(self::$ACCOUNT_FIRSTNAME => $user_params[self::$ACCOUNT_FIRSTNAME],
                self::$ACCOUNT_LASTNAME => $user_params[self::$ACCOUNT_LASTNAME],
                self::$ACCOUNT_EMAIL => $user_params[self::$ACCOUNT_EMAIL],
                self::$ACCOUNT_PASSWORD => $user_params[self::$ACCOUNT_PASSWORD],
                self::$ACCOUNT_ACTIVE => true,
                self::$ACCOUNT_LOGIN_STATUS => true);
        } else {
            return array(
                self::$ACCOUNT_ID => $user_params[Seller::$SELLER_FK_ACC_ID],
                self::$ACCOUNT_FIRSTNAME => $user_params[self::$ACCOUNT_FIRSTNAME],
                self::$ACCOUNT_LASTNAME => $user_params[self::$ACCOUNT_LASTNAME],
                self::$ACCOUNT_EMAIL => $user_params[self::$ACCOUNT_EMAIL],
                self::$ACCOUNT_PASSWORD => $user_params[self::$ACCOUNT_PASSWORD],
                self::$ACCOUNT_ACTIVE => true,
                self::$ACCOUNT_LOGIN_STATUS => true);
        }

    }
}
