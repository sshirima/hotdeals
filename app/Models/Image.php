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
use Storage;


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

    public static function saveImageS3($advert, $i, $img){
        $imageName = time() . $i . '.' . $img->getClientOriginalExtension();

        //Resize image
        $image = \Intervention\Image\Facades\Image::make($img);

        $image->resize(900, 600);

        //Create an image resource
        $imgRes = $image->stream()->detach();

        //Save image to the S3 storage
        $aws = Storage::disk('s3')->put($imageName, $imgRes, 'public');
        $imageName = Storage::disk('s3')->url($imageName);

        //Save image to the local application local storage {public folder}
        /*$location = public_path('images/' . $imageName);
        Image::make($image)->resize(900, 600)->save($location);*/

        $input['img_name'] = $imageName;
        $advert->images()->create($input);
    }
}