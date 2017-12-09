<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version November 23, 2017, 9:50 am UTC
 *
 * @property string name
 */
class Category extends Model
{
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cat_name' => 'required|max:50'
    ];
    public $timestamps = false;

    public $table = 'categories';

    public $fillable = [
        'cat_name'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cat_name' => 'string'
    ];

    public function adverts()
    {
        return $this->belongsToMany('App\Models\Advert', 'advert_category', 'category_id', 'advert_id');
    }
}
