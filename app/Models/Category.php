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
        'cat_name' => 'required|max:50',
        'cat_type' => 'required'
    ];
    public $timestamps = false;

    public $table = 'categories';

    public $fillable = [
        'cat_name',
        'cat_type'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cat_name' => 'string',
        'cat_type' =>'string'
    ];

    public function adverts()
    {
        return $this->belongsToMany('App\Models\Advert', 'advert_category', 'category_id', 'advert_id');
    }

    public function subcategories()
    {
        return $this->belongsToMany('App\Models\SubCategory', 'category_subcategory', 'category_id', 'subcategory_id');
    }
}
