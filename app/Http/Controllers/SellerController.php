<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/12/2017
 * Time: 12:18 AM
 */

namespace App\Http\Controllers;


use App\Seller;
use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function addSeller(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'slr_phonenumber' => '0754711711',
                'fk_acc_id' => 34
            ]);

        return Seller::addModel(new Seller(), $request->attributes->all());
    }

    public function updateSeller(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'slr_id' => 12,
                'slr_phonenumber' => '0754711711',
                'fk_acc_id' => 34
            ]);
        $params = $request->attributes->all();

        $id = $params[Seller::$SELLER_ID];

        $seller = self::getSellerById($id);

        $seller instanceof Seller ? $response = Seller::updateModel($seller, $params) : $response = $seller;

        return $response;
    }

    public function deleteSeller()
    {
        $id = 1;

        $seller = self::getSellerById($id);

        $seller instanceof Seller ? $response = Seller::deleteModel($seller) : $response = $seller;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getSellerById($id)
    {

        try {
            return Seller::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }


}