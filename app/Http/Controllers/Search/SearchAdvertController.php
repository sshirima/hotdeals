<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/15/2018
 * Time: 11:16 PM
 */

namespace App\Http\Controllers\Search;

use App\Http\Controllers\DisplayAdverts\ShowAdvertBaseController;
use App\Models\Advert;
use Illuminate\Http\Request;

class SearchAdvertController extends ShowAdvertBaseController
{
    public function search(Request $request){
        $keyword = $request['search'];
        $adverts = Advert::search($keyword)->get();
         if (!empty($adverts)){
             $productAdverts = array();
             $serviceAdverts = array();
             foreach ($adverts as $advert){
                 if($advert->adv_type === 'Product'){
                     array_push($productAdverts, $advert);
                 } else {
                     array_push($serviceAdverts, $advert);
                 }
             }
             if (sizeof($productAdverts) > sizeof($serviceAdverts)){
                 $productAdverts = $this->getProductAdvertInfo($productAdverts);
                 $categories = parent::getTopCategories('Product', 5);
                 return view('searchadverts.product-search')->with(['adverts' => $productAdverts,'topCategories'=>$categories]);
             } else {
                 $serviceAdverts = $this->getServiceAdvertInfo($serviceAdverts);
                 $categories = parent::getTopCategories('Service', 5);
                 return view('searchadverts.service-search')->with(['adverts' => $serviceAdverts, 'topCategories'=>$categories]);
             }
         }
        return view('searchadverts.product-search')->with(['adverts' => $adverts]);
    }

}