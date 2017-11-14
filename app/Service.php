<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseHandler;

class Service extends Model
{
    public static $SERVICE_ID = 'srv_id';
    public static $SERVICE_FK_ITEM_ID = 'fk_itm_id';
    public $timestamps = false;
    protected $table = 'services';
    protected $primaryKey = 'srv_id';

    public static function addService(array $params)
    {
        $response = BaseHandler::addOrThrow(new Service(), $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    public static function updateService(array $params)
    {
        $old_service = Service::find($params[Service::$SERVICE_ID]);

        $response = BaseHandler::updateOrThrow($old_service, $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    public static function deleteService($id)
    {
        $product = Service::find($id);

        $response = BaseHandler::deleteOrThrow($product);

        return array('response' => $response['response'], 'data' => $response['data']);
    }
}
