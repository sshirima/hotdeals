<?php

namespace App;


use Illuminate\Http\Request;
use App\Exceptions\BaseHandler;

class Seller extends BaseModel
{
    public static $SELLER_ID = 'slr_id';
    public static $SELLER_PHONENUMBER = 'slr_phonenumber';
    public static $SELLER_FK_ACC_ID = 'fk_acc_id';
    public $timestamps = false;
    protected $table = 'sellers';
    protected $primaryKey = 'slr_id';

    private static function getParamsFromRequest(Request $request, $isnew)
    {
        $user_params = $request->attributes->all();
        if ($isnew) {
            return array(self::$SELLER_PHONENUMBER => $user_params[self::$SELLER_PHONENUMBER]);
        } else {
            return array(self::$SELLER_ID => $user_params[self::$SELLER_ID],
                self::$SELLER_PHONENUMBER => $user_params[self::$SELLER_PHONENUMBER]);
        }
    }

    public static function addSeller(Request $request, $account)
    {
        if ($account['response']->code == 'OK') {
            //Add new seller
            $seller_params = Seller::getParamsFromRequest($request, true);

            //Add account Id
            $seller_params[Seller::$SELLER_FK_ACC_ID] = $account['data'][Account::$ACCOUNT_ID];

            return Seller::addModel(new Seller(), $seller_params);
        } else {
            return $account;
        }

    }

    public static function updateSeller(Request $request, $account)
    {
        if ($account['response']->code == 'OK') {

            $seller_params = Seller::getParamsFromRequest($request, false);

            $seller = self::getSellerById($seller_params[Seller::$SELLER_ID]);

            $seller instanceof Seller ? $response = Seller::updateModel($seller, $seller_params) : $response = $seller;
        } else {
            $response = $account['response'];
        }

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getSellerById($id)
    {

        try {
            return Seller::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }
}



