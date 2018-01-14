<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/12/2018
 * Time: 5:09 PM
 */

namespace App\Http\Controllers\DeleteAdverts;


use App\Http\Controllers\Controller;

class DeleteAdvertBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function deleteAdvertInfo($advert){
        $advert->rates()->delete();
        $advert->comments()->delete();
        $advert->location()->delete();
        $advert->categories()->detach();
        $advert->product()->delete();
        $images = $advert->images()->get();
        foreach ($images as $image){
            $image->forceDelete();
            /*$status = Storage::disk('s3')->delete(basename($image->img_name));*/
            $status = \Storage::delete($image->img_name);
        }
    }

}