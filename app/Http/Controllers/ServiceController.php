<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 12:39 AM
 */

namespace App\Http\Controllers;


use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function addService(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'fk_itm_id' => 14
            ]);

        return Service::addModel(new Service(), $request->attributes->all());
    }

    public function updateService(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'srv_id' => 1,
                'fk_itm_id' => 10
            ]);
        $params = $request->attributes->all();

        $id = $params[Service::$SERVICE_ID];

        $service = self::getServiceById($id);

        $service instanceof Service ? $response = Service::updateModel($service, $params) : $response = $service;

        return $response;
    }

    public function deleteService()
    {
        $id = 1;

        $service = self::getServiceById($id);

        $service instanceof Service ? $response = Service::deleteModel($service) : $response = $service;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getServiceById($id)
    {

        try {
            return Service::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }
}