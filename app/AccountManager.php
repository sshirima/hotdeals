<?php
/**
 * Created by PhpStorm.
 * User: sshirima
 * Date: 11/11/2017
 * Time: 12:56 PM
 */

namespace App;

use Illuminate\Http\Request;

class AccountManager
{
    public static function registerSeller(Request $request)
    {

        $account = Account::addAccount($request);

        return Seller::addSeller($request, $account);
    }

    public static function updateSeller(Request $request)
    {

        $account = Account::updateAccount($request);

        return Seller::updateSeller($request, $account);

    }

    public static function deleteSeller($id)
    {
        return Account::deleteAccount($id);
    }

}