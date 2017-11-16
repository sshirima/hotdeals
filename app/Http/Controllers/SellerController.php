<?php

use App\Exceptions\BaseHandler;
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/12/2017
 * Time: 12:18 AM
 */

namespace App\Http\Controllers;

use App\AccountManager;
use App\Seller;
use App\Response;
use Illuminate\Http\Request;


class SellerController extends Controller
{
    public function registerSeller(Request $request)
    {
        $request = new Request();

        $request->attributes->add([
            'acc_fname' => 'Jimmy',
            'acc_lname' => 'Shirima',
            'acc_email' => 'jimmy.shirima@hotedeals.com',
            'acc_password' => 'password',
            'slr_phonenumber' => '0754711711'
        ]);

        return AccountManager::registerSeller($request);
    }


    public function updateSeller(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'slr_id' => 20,
                'acc_fname' => 'Samson',
                'acc_lname' => 'Stephen',
                'acc_email' => 'samson.shirima@hotedeals.com',
                'acc_password' => 'password',
                'slr_phonenumber' => '255754710618',
                'fk_acc_id' => 43
            ]);
        return AccountManager::updateSeller($request);
    }

    public function deleteSeller()
    {
        $seller_account_id = 65;
        return AccountManager::deleteSeller($seller_account_id);
    }



}