<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'value' => 'required',
        'advert_id' => 'required',
        'user_id' => 'required'
    ];

    /**
     * Tablename
     *
     * @var string
     */
    public $table = 'rates';

    /**Mass assignment fields
     * @var array
     */
    public $fillable = [
        'value',
        'advert_id',
        'user_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'value' => 'integer',
        'advert_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * One to many
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advert()
    {
        return $this->belongsTo('App\Models\Advert', 'advert_id', 'id');
    }

    /**
     * One to one relationship with User
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'user_id', 'id');
    }
}
