<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 10:28 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseHandler;

class BaseModel extends Model
{
    /**
     * @param $model
     * @param array $params
     * @return array
     */
    public static function addModel($model, array $params)
    {
        $response = BaseHandler::addOrThrow($model, $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    /**
     * @param $model
     * @param array $params
     * @return array
     */
    public static function updateModel($model, array $params)
    {

        $response = BaseHandler::updateOrThrow($model, $params);

        return array('response' => $response['response'], 'data' => $response['data']);
    }

    /**
     * @param $model
     * @return array
     */
    public static function deleteModel($model)
    {

        $response = BaseHandler::deleteOrThrow($model);

        return array('response' => $response['response'], 'data' => $response['data']);
    }
}