<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseHandler;
use Illuminate\Http\Request;

class Service extends BaseModel
{
    public $timestamps = false;
    protected $table = 'services';
    protected $primaryKey = 'srv_id';

    public static $SERVICE_ID = 'srv_id';
    public static $SERVICE_NAME = 'srv_name';
    public static $SERVICE_FK_ITEM_ID = 'fk_itm_id';

    /**
     * @param Request $request
     * @param $item
     * @return array
     */
    public static function addService(Request $request, $item)
    {
        if ($item['response']->code == 'OK') {

            $service_params = array();

            $service_params[Service::$SERVICE_FK_ITEM_ID] = $item['data'][Item::$ITEM_ID];

            return Service::addModel(new Service(), $service_params);
        } else {
            return $item;
        }
    }

    public static function updateService(Request $request, $item)
    {
        if ($item['response']->code == 'OK') {
            $service_params = BaseHandler::getParametersFromRequest($request, array(self::$SERVICE_ID));

            $service = self::findModelById($service_params[self::$SERVICE_ID], Service::class);

            if ($service instanceof Service) {
                $service_params[Service::$SERVICE_FK_ITEM_ID] = $item['data'][Item::$ITEM_ID];

                return Service::updateModel($service, $service_params);
            } else {
                return $service;
            }
        } else {
            return $item;
        }
    }
}
