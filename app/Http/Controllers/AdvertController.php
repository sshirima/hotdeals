<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/13/2017
 * Time: 5:34 PM
 */

namespace App\Http\Controllers;


use App\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function createAdvert()
    {
        //Verify the parameters

        $request = new Request();
        $request->attributes
            ->add(['adv_title' => 'New adverts',
                'adv_description' => 'Some description',
                'adv_expiredate' => '2017-11-13',
                'adv_approved' => false,
                'fk_slr_id' => 12
            ]);

        return Advert::addAdvert($request->attributes->all());
    }

    public function updateAdvert()
    {
        // Verify parameters

        $request = new Request();
        $request->attributes
            ->add([
                'adv_id' => 2,
                'adv_title' => 'Modified after exception added',
                'adv_description' => 'Some description',
                'adv_expiredate' => '2017-11-13',
                'adv_approved' => true,
                'fk_slr_id' => 12
            ]);
        return Advert::updateAdvert($request->attributes->all());

    }

    public function deleteAdvert()
    {

        return Advert::deleteAdvert(2);
    }

}