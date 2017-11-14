<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 12:16 AM
 */

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @param Request $request
     * @return array
     */
    public function addProduct(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add(['pdc_name' => 'Iphone 8',
                'pdc_manufacturer' => 'Apple',
                'pdc_model' => 'Iphone 8',
                'fk_itm_id' => 7
            ]);
        return Product::addProduct($request->attributes->all());
    }

    /**
     * @param Request $request
     * @return array
     */
    public function updateProduct(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'pdc_id' => 1,
                'pdc_name' => 'Phone',
                'pdc_manufacturer' => 'Samsung',
                'pdc_model' => 'Note 3',
                'fk_itm_id' => 6
            ]);
        return Product::updateProduct($request->attributes->all());
    }

    public function deleteProduct()
    {
        return Product::deleteProduct(1);
    }
}