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

        $response = self::prepareModelResponse();
        try {
            $model = self::fillParamOrThrow($model, $params, array_keys($params));
            $model->save();
        } catch (FatalErrorException $ex) {
            self::setFailedResponse($response, 'Fail to add the model', $ex);
        } catch (\Exception $ex) {
            self::setFailedResponse($response, 'Fail to add the model', $ex);
        }
        return array('response' => $response, 'data' => $model);
    }

    public static function prepareModelResponse()
    {
        $response = new Response();
        $response->setResponseSuccess();
        $response->setDescription('Operation was successful');
        return $response;
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

    /**
     * @param Response $response
     * @param $description
     * @param \Exception $ex
     * @return Response
     */
    public static function setFailedResponse(Response $response, $description, \Exception $ex)
    {
        $response->setResponseFail();
        $response->setDescription($description);
        $response->setDetailedDescription($ex->getMessage());
        return $response;
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
            $model = self::fillParamOrThrow($model, $params, array_keys($params));
            $model->update();
        } catch (\Exception $ex) {
            self::setFailedResponse($response, 'Fail to add the model', $ex);
        }
        return array('response' => $response, 'data' => $model);
    }

    /**
     * @param $model
     * @return array
     */
    public static function deleteOrThrow($model)
    {
        $response = self::prepareModelResponse();
        try {
            if ($model == null || !($model instanceof Model)) {
                throw new FatalErrorException();
            } else {
                $model->delete();
            }
        } catch (\Exception $ex) {
            self::setFailedResponse($response, 'Fail to delete the model', $ex);
        }
        return array('response' => $response, 'data' => $model);
    }

    public static function failedNoException(Response $response, $description)
    {
        $response->setResponseFail();
        $response->setDescription($description);
        return array('response' => $response, 'data' => null);
    }

}