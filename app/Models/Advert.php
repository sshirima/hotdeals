<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Advert
 * @package App\Models
 * @version November 23, 2017, 10:49 am UTC
 *
 * @property string title
 * @property string description
 * @property date expiredate
 * @property integer seller_id
 */
class Advert extends Model
{
    use SoftDeletes;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:255',
        'description' => 'required',
        'expiredate' => 'required|date',
        'approveddate' => 'date',
        'seller_id' => 'required'
    ];
    public $table = 'adverts';
    public $fillable = [
        'title',
        'description',
        'expiredate',
        'seller_id'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'expiredate' => 'date',
        'approved' => 'boolean',
        'approveddate' => 'date',
        'seller_id' => 'integer'
    ];
}
