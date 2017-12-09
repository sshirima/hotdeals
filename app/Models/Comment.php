<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'com_contents' => 'required|max:50',
        'advert_id' => 'required|numeric',
        'user_id' => 'required|numeric'
    ];

    public $table = 'comments';

    public $fillable = [
        'com_contents',
        'advert_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'com_contents' => 'string',
        'advert_id' => 'integer',
        'user_id' => 'integer'
    ];

    public static function getTimeDifference($date)
    {
        $now = new \DateTime('now');
        $diff = $now->diff($date);
        if ($diff->y != 0) {
            return $diff->y . ' years';
        } elseif ($diff->m != 0) {
            return $diff->m . ' months';
        } elseif ($diff->d != 0) {
            return $diff->d . ' days';
        } elseif ($diff->h != 0) {
            return $diff->h . ' hours';
        } elseif ($diff->i != 0) {
            return $diff->i . ' minutes';
        } elseif ($diff->s != 0) {
            return $diff->s . ' seconds';
        }
    }

    public function advert()
    {

        return $this->belongsTo('App\Models\Advert', 'advert_id', 'id');
    }

    public function user()
    {

        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
