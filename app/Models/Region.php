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
class Region extends Model
{

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reg_name' => 'required|max:50'
    ];
    public $timestamps = false;

    public $table = 'regions';

    public $fillable = [
        'reg_name'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'reg_name' => 'string'
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

}
