<?php

namespace App;

use Illuminate\Http\Request;

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

    /**
     * @param Request $request
     * @return array
     */
    public static function addAdvert(Request $request)
    {

        $advert_params = self::getParamsFromRequest($request, true);

        return Advert::addModel(new Advert(), $advert_params);
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function updateAdvert(Request $request)
    {
        $advert_params = self::getParamsFromRequest($request, false);

        $advert = self::findModelById($advert_params[self::$ADVERT_ID], Advert::class);

        if ($advert instanceof Advert) {
            return Advert::updateModel($advert, $advert_params);
        } else {
            return $advert;
        }
    }

    public static function deleteAdvert()
    {

    }

    /**
     * @param Request $request
     * @param $isnew
     * @return array
     */
    private static function getParamsFromRequest(Request $request, $isnew)
    {
        $user_params = $request->attributes->all();
        if ($isnew) {
            return array(
                self::$ADVERT_TITLE => $user_params[self::$ADVERT_TITLE],
                self::$ADVERT_DESCRIPTION => $user_params[self::$ADVERT_DESCRIPTION],
                self::$ADVERT_EXPIRE_DATE => $user_params[self::$ADVERT_EXPIRE_DATE],
                self::$ADVERT_APPROVED => false,
                self::$ADVERT_FK_SELLER_ID => $user_params[self::$ADVERT_FK_SELLER_ID]
            );
        } else {
            return array(
                self::$ADVERT_ID => $user_params[self::$ADVERT_ID],
                self::$ADVERT_TITLE => $user_params[self::$ADVERT_TITLE],
                self::$ADVERT_DESCRIPTION => $user_params[self::$ADVERT_DESCRIPTION],
                self::$ADVERT_EXPIRE_DATE => $user_params[self::$ADVERT_EXPIRE_DATE],
                self::$ADVERT_APPROVED => $user_params[self::$ADVERT_APPROVED],
                self::$ADVERT_FK_SELLER_ID => $user_params[self::$ADVERT_FK_SELLER_ID]
            );
        }
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getAdvertById($id)
    {

        try {
            return Advert::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }
}
