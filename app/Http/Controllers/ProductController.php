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

    public function addProduct(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add(['pdc_name' => 'Iphone 7',
                'pdc_manufacturer' => 'Apple',
                'pdc_model' => 'Iphone 8',
                'fk_itm_id' => 15
            ]);

        return Product::addModel(new Product(), $request->attributes->all());
    }

    public function updateProduct(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'pdc_name' => 'Iphone 8',
                'pdc_manufacturer' => 'Apple',
                'pdc_model' => 'Iphone 8',
                'fk_itm_id' => 15
            ]);
        $params = $request->attributes->all();

        $id = $params[Product::$PRODUCT_ID];

        $product = self::getProductById($id);

        $product instanceof Product ? $response = Product::updateModel($product, $params) : $response = $product;

        return $response;
    }

    public function deleteProduct()
    {
        $id = 1;

        $product = self::getProductById($id);

        $product instanceof Product ? $response = Product::deleteModel($product) : $response = $product;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getProductById($id)
    {

        try {
            return Product::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }
}