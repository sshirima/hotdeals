<?php

namespace App\Models;

/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/28/2017
 * Time: 11:37 PM
 */

use Eloquent as Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{

    public static $rules = [
        'advert_id' => 'required',
        'region_id' => 'required'
    ];
    public $timestamps = false;
    public $table = 'locations';

    public $fillable = [
        'advert_id',
        'region_id'
    ];

    protected $casts = [
        'advert_id' => 'integer',
        'region_id' => 'integer',
        'longitude' => 'string',
        'latitude' => 'string'
    ];
}