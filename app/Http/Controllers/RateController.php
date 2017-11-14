<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 11:58 PM
 */

namespace App\Http\Controllers;

use App\Rate;
use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function addRate(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'rat_value' => 2,
                'fk_acc_id' => 33,
                'fk_adv_id' => 3
            ]);

        return Rate::addModel(new Rate(), $request->attributes->all());
    }

    public function updateRate(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'rat_id' => 3,
                'rat_value' => 5,
                'fk_acc_id' => 33,
                'fk_adv_id' => 3
            ]);
        $params = $request->attributes->all();

        $id = $params[Rate::$RATE_ID];

        $rate = self::getRateById($id);

        $rate instanceof Rate ? $response = Rate::updateModel($rate, $params) : $response = $rate;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getRateById($id)
    {

        try {
            return Rate::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }

    public function deleteRate()
    {
        $id = 1;

        $rate = self::getRateById($id);

        $rate instanceof Rate ? $response = Rate::deleteModel($rate) : $response = $rate;

        return $response;
    }
}