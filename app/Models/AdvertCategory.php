<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region
 * @package App\Models
 * @version November 22, 2017, 9:46 pm UTC
 *
 * @property string name
 */
class AdvertCategory extends Model
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'advert_id' => 'required',
        'category_id' => 'required'
    ];
    public $timestamps = false;

    public $table = 'adverts_categories';

    public $fillable = [
        'advert_id',
        'category_id',
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'advert_id' => 'integer',
        'category_id' => 'integer'
    ];


}
