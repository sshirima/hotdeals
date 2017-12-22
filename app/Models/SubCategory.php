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
class SubCategory extends Model
{
    public static $rules = [
        'subcat_name' => 'required|max:50'
    ];
    public $timestamps = false;
    public $table = 'subcategories';
    public $fillable = [
        'subcat_name',
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    protected $primaryKey = 'subcat_id';
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subcat_name' => 'string'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_subcategory', 'subcategory_id', 'category_id');
    }
}
