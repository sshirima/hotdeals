<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/20/2017
 * Time: 4:23 PM
 */

namespace App;


class AdvertPublisher
{
    public static function threeColumnsOutput($result)
    {
        $i = 0;
        $r = 0;
        $output = array();
        $row = array();

        for ($j = 0; $j < count($result); $j++) {
            if ($i < 3) {
                $row[$i] = $result[$j];
            } else {
                $output[$r] = $row;
                $r++;
                $i = 0;
                $row = array();
                $row[$i] = $result[$j];
            }
            $i++;
        }
        $output[$r] = $row;
        return $output;
    }

}