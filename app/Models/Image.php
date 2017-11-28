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

class Image extends Model
{
    use SoftDeletes;

    public static $rules = [
        'img_name' => 'required|max:50',
        'advert_id' => 'required'
    ];
    public $table = 'images';
    public $fillable = [
        'img_name',
        'advert_id'
    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'img_name' => 'string',
        'advert_id' => 'integer'
    ];
}