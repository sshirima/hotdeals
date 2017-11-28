<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/13/2017
 * Time: 9:53 PM
 */

namespace App\Exceptions;

use App\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\Debug\Exception\FatalErrorException;


class BaseHandler extends Handler
{
    /**
     * @param $model
     * @param array $params
     * @return array
     */
    public static function addOrThrow($model, array $params)
    {
        try {
            $model = self::fillParamOrThrow($model, $params, array_keys($params));
            $response = $model->save();
            $ex = null;
        } catch (FatalErrorException $ex) {
            $response = false;
        } catch (\Exception $ex) {
            $response = false;
        }
        return array('status' => $response, 'error' => $ex, 'model' => $model);
    }

    /**
     * @param $model
     * @param array $params
     * @param $columns
     * @return mixed
     * @throws FatalErrorException
     */
    public static function fillParamOrThrow($model, array $params, $columns)
    {

        if ($model == null || !($model instanceof Model)) {
            throw new FatalErrorException();
        } else {
            for ($i = 0; $i < count($columns); $i++) {
                $model->setAttribute($columns[$i], $params[$columns[$i]]);
            }
        }
        return $model;
    }

    public static function getParametersFromRequest($request, $model_columns)
    {
        $params = array();
        if (!($request instanceof $request) || $model_columns == null) {
            throw new FatalErrorException();
        } else {
            $request_attributes = $request->attributes->all();
            for ($i = 0; $i < count($model_columns); $i++) {
                $params[$model_columns[$i]] = $request_attributes[$model_columns[$i]];
            }
        }
        return $params;
    }

    /**
     * @param $model
     * @param array $params
     * @return array
     */
    public static function updateOrThrow($model, array $params)
    {
        try {
            $model = self::fillParamOrThrow($model, $params, array_keys($params));
            $response = $model->update();
            $ex = null;
        } catch (\Exception $ex) {
            $response = false;
        }

        return array('status' => $response, 'error' => $ex, 'model' => $model);
    }

    /**
     * @param $model
     * @return array
     */
    public static function deleteOrThrow($model)
    {
        try {
            if ($model == null || !($model instanceof Model)) {
                throw new FatalErrorException();
            } else {
                $response = $model->delete();
                $ex = null;
            }
        } catch (\Exception $ex) {
            $response = false;
        }
        return array('status' => $response, 'error' => $ex, 'model' => $model);
    }

}