<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/14/2017
 * Time: 6:57 PM
 */

namespace App\Http\Controllers\EditAdverts;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Image;
use Storage;

class EditAdvertBaseController extends Controller
{
    public function getAdvertInfo($advert){

        $location = $advert->location()->select(['region_id'])->first();

        $advert['categories'] = $advert->categories()->get();

        $advert['region'] = $location->region()->first();

        return $advert;
    }

    public function updateAdvert(FormRequest $request, $advert){
        $input = $request->all();

        $advert->categories()->detach();

        $advert->categories()->attach($input['category_id']);

        $advert->location()->first()->update($input);

        if ($request->hasFile('img_name')) {
            $images = $request->file('img_name');
            $i = 0;
            $previousImages = $advert->images()->get();
            foreach ($images as $img) {
                Image::saveImageToStorage($advert, $i, $img);
                $i++;
            }
            //Deleting old images
            foreach ($previousImages as $image) {
                $image->forceDelete();

                /*$status = Storage::disk('s3')->delete(basename($image->img_name));*/
                $status = \Storage::delete($image->img_name);
            }
        }
    }

}