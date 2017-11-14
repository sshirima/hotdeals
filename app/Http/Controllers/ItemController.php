<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/13/2017
 * Time: 9:50 PM
 */

namespace App\Http\Controllers;


use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function addItem(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add(['itm_type' => 'PRODUCT',
                'itm_pcost' => 5000,
                'itm_ccost' => 1000,
                'itm_brand' => 'Shirima',
                'fk_adv_id' => 3
            ]);
        return Item::addItem($request->attributes->all());
    }

    public function updateItem(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'itm_id' => 10,
                'itm_type' => 'service',
                'itm_pcost' => 100,
                'itm_ccost' => 200,
                'itm_brand' => 'Iphone',
                'fk_adv_id' => 3
            ]);
        return Item::updateItem($request->attributes->all());
    }

    public function deleteItem()
    {

        return Item::deleteItem(4);
    }

}