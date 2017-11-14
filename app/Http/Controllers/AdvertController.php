<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/13/2017
 * Time: 5:34 PM
 */

namespace App\Http\Controllers;


use App\Advert;
use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function addAdvert(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'adv_title' => 'Modified after exception added',
                'adv_description' => 'Some description',
                'adv_expiredate' => '2017-11-13',
                'adv_approved' => true,
                'fk_slr_id' => 12
            ]);

        return Advert::addModel(new Advert(), $request->attributes->all());
    }

    public function updateAdvert(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'adv_id' => 2,
                'adv_title' => 'Modified adverts',
                'adv_description' => 'Some description',
                'adv_expiredate' => '2017-11-13',
                'adv_approved' => true,
                'fk_slr_id' => 12
            ]);
        $params = $request->attributes->all();

        $id = $params[Advert::$ADVERT_ID];

        $advert = self::getAdvertById($id);

        $advert instanceof Advert ? $response = Advert::updateModel($advert, $params) : $response = $advert;

        return $response;
    }

    public function deleteAdvert()
    {
        $id = 1;

        $advert = self::getAdvertById($id);

        $advert instanceof Advert ? $response = Advert::deleteModel($advert) : $response = $advert;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getAdvertById($id)
    {

        try {
            return Advert::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }

}