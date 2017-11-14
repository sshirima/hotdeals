<?php
/**
 * Created by PhpStorm.
 * User: sshirima
 * Date: 11/11/2017
 * Time: 1:53 PM
 */

namespace App;


class Response
{
    public static $LEVEL_SUCCESS = 1;
    public static $LEVEL_WARNING = 2;
    public static $LEVEL_FAIL = 3;

    public static $STATUS_OK = 200;
    public static $STATUS_ACCEPTED = 201;
    public static $STATUS_BAD_REQUEST = 400;
    public static $STATUS_UNAUTHORIZED = 401;
    public static $STATUS_FORBIDDEN = 403;
    public static $STATUS_NOTFOUND = 404;

    public static $CODE_SUCCESS = 'OK';
    public static $CODE_WARNING = 'WARNING';
    public static $CODE_FAILS = 'FAILS';

    public $code;
    public $description;
    public $detailedDescription;
    public $level;
    public $status;

    public function __construct()
    {
        $this->setResponseSuccess();
    }

    public function setResponseSuccess()
    {
        $this->code = Response::$CODE_SUCCESS;
        $this->status = Response::$STATUS_ACCEPTED;
        $this->level = Response::$LEVEL_SUCCESS;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDetailedDescription()
    {
        return $this->detailedDescription;
    }

    /**
     * @param mixed $detailedDescription
     */
    public function setDetailedDescription($detailedDescription)
    {
        $this->detailedDescription = $detailedDescription;
    }

    public function setResponseFail()
    {
        $this->code = Response::$CODE_FAILS;
        $this->level = Response::$LEVEL_FAIL;
    }

    public function setResponseWarning()
    {
        $this->code = Response::$CODE_WARNING;
        $this->level = Response::$LEVEL_WARNING;
    }

}