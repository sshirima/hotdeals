<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/13/2017
 * Time: 9:50 PM
 */

namespace App\Http\Controllers;


use App\Item;
use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function addItem(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'itm_type' => 'service',
                'itm_pcost' => 100,
                'itm_ccost' => 200,
                'itm_brand' => 'Iphone',
                'fk_adv_id' => 3,
                'fk_cat_id' => 2
            ]);

        return Item::addModel(new Item(), $request->attributes->all());
    }

    public function updateItem(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'itm_id' => 14,
                'itm_type' => 'service',
                'itm_pcost' => 100,
                'itm_ccost' => 200,
                'itm_brand' => 'Iphone',
                'fk_adv_id' => 3,
                'fk_cat_id' => 2
            ]);
        $params = $request->attributes->all();

        $id = $params[Item::$ITEM_ID];

        $item = self::getItemById($id);

        $item instanceof Item ? $response = Item::updateModel($item, $params) : $response = $item;

        return $response;
    }

    public function deleteItem()
    {
        $id = 1;

        $item = self::getItemById($id);

        $item instanceof Item ? $response = Item::deleteModel($item) : $response = $item;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getItemById($id)
    {

        try {
            return Item::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }

}