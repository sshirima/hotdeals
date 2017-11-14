<?php

namespace App;

use App\Exceptions\AdvertHandler;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
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
     * @param array $params
     * @return array
     */
    public static function addAdvert(array $params)
    {

        $response = AdvertHandler::addOrThrow($params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    /**
     * @param array $params
     * @return array
     */
    public static function updateAdvert(array $params)
    {

        $old_advert = Advert::find($params[Advert::$ADVERT_ID]);

        $response = AdvertHandler::updateOrThrow($old_advert, $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    public static function deleteAdvert($id)
    {

        $advert = Advert::find($id);

        $response = AdvertHandler::deleteOrThrow($advert);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    public static function fillParams(Advert $advert, array $params)
    {
        $advert->setAttribute(Advert::$ADVERT_TITLE, $params[Advert::$ADVERT_TITLE]);
        $advert->setAttribute(Advert::$ADVERT_DESCRIPTION, $params[Advert::$ADVERT_DESCRIPTION]);
        $advert->setAttribute(Advert::$ADVERT_EXPIRE_DATE, $params[Advert::$ADVERT_EXPIRE_DATE]);
        $advert->setAttribute(Advert::$ADVERT_APPROVED, $params[Advert::$ADVERT_APPROVED]);
        $advert->setAttribute(Advert::$ADVERT_FK_SELLER_ID, $params[Advert::$ADVERT_FK_SELLER_ID]);
        return $advert;
    }
}
