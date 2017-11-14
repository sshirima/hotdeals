<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 6:40 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Image;

class ImagesController extends Controller
{

    public function addImage(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'img_path' => 'images-path',
                'img_name' => 'IMAGE_NAME',
                'img_width' => '239',
                'img_height' => '300',
                'fk_itm_id' => 12
            ]);

        return Image::addImage($request->attributes->all());
    }

    public function updateImage(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'img_id' => 2,
                'img_path' => 'images-path',
                'img_name' => 'UPDATED_NAME',
                'img_width' => '239',
                'img_height' => '300',
                'fk_itm_id' => 11
            ]);
        return Image::updateImage($request->attributes->all());
    }

    public function deleteImage()
    {
        return Image::deleteImage(1);
    }

}