<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version November 24, 2017, 12:09 am UTC
 *
 * @property string name
 * @property string brand
 * @property string manufacturer
 * @property string model
 * @property unsignedinteger p_cost
 * @property unsignedinteger c_cost
 * @property integer advert_id
 */
class Product extends Model
{
    use SoftDeletes;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:50',
        'brand' => 'required|max:50',
        'p_cost' => 'required|numeric',
        'c_cost' => 'required|numeric',
        'advert_id' => 'required'
    ];
    public $table = 'products';

    public $fillable = [
        'name',
        'brand',
        'manufacturer',
        'model',
        'p_cost',
        'c_cost',
        'advert_id'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'brand' => 'string',
        'manufacturer' => 'string',
        'model' => 'string',
        'advert_id' => 'integer'
    ];

    public function advert()
    {

        return $this->belongsTo('App\Models\Advert', 'advert_id', 'id');
    }
}
