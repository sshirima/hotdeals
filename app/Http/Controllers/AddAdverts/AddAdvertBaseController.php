<?php

namespace App\Http\Controllers\AddAdverts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\AdvertRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Image;

class AddAdvertBaseController extends Controller
{
    /**
     * @param AdvertRepository $advertsRepo
     * @param FormRequest $request
     * @return mixed
     */
    public function storeAdvertInfo(AdvertRepository $advertsRepo, FormRequest $request){

        if ($request->has('subcat_id')) {
            $subcategories = $request['subcat_id'];
            $category = Category::find($request['category_id']);
            foreach ($subcategories as $subcategory) {
                $category->subcategories()->attach($subcategory);
            }
        }

        $input = $request->all();

        $advert = $advertsRepo->create($input);

        if ($request->hasFile('img_name')) {
            $images = $request->file('img_name');
            $i = 0;
            foreach ($images as $img) {
                Image::saveImageS3($advert, $i, $img);
                $i++;
            }
        }

        $advert->location()->create($input);

        $advert->categories()->attach($input['category_id']);

        return $advert;
    }
}