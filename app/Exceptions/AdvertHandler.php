<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/13/2017
 * Time: 7:21 PM
 */

namespace App\Exceptions;

use App\Advert;

class AdvertHandler extends BaseHandler
{
    /**
     * @param array $params
     * @return array
     */
    public static function addOrThrow(array $params)
    {
        $response = self::prepareModelResponse();
        try {
            $model = Advert::fillParams(new Advert(), $params);
            $model->save();
        } catch (\Exception $ex) {
            self::setFailedResponse($response, 'Fail to add the model', $ex);
        }
        return array('response' => $response, 'data' => $model);
    }

    /**
     * @param $model
     * @param array $params
     * @return array
     */

    public static function updateOrThrow($model, array $params)
    {
        $response = self::prepareModelResponse();
        try {
            $model = Advert::fillParams($model, $params);
            $model->update();
        } catch (\Exception $ex) {
            self::setFailedResponse($response, 'Fail to update the model', $ex);
        }
        return array('response' => $response, 'data' => $model);
    }

    public static function deleteOrThrow($model)
    {
        $response = self::prepareModelResponse();
        try {
            if ($model == null) {
                throw new \Exception();
            } else {
                $model->delete();
            }
        } catch (\Exception $ex) {
            self::setFailedResponse($response, 'Fail to delete the model', $ex);
        }
        return array('response' => $response, 'data' => $model);
    }
}