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

    private $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function addSellerAccount(Request $request)
    {
        $returnObject = null;
        $acc = new Account();
        $account = Account::fillAccountParams($request, $acc);

        if ($account->save()) {
            $returnObject = $account;
        } else {
            $this->response->setResponseFail();
            $this->response->setDescription('Fail to register new seller');
        }
        return array('response' => $this->response, 'data' => $returnObject);
    }


    public function updateSellerAccount(Request $request)
    {
        $returnObject = null;
        $account = new Account();
        $account_id = $request->attributes->get(Account::$ACCOUNT_ID);
        $acc = $account->find($account_id);

        if ($acc == null) {
            $this->response->setResponseFail();
            $this->response->setDescription('Could not find account with an id = ' . $account_id);
        } else {
            $account = Account::fillAccountParams($request, $acc);
            if ($account->update()) {
                $returnObject = $account;
            } else {
                $this->response->setResponseFail();
                $this->response->setDescription('Fail to update seller information');
            }
        }


        return array('response' => $this->response, 'data' => $returnObject);
    }

    public function deleteAccount($account_id)
    {
        $returnObject = null;
        $account = new Account();
        $acc = $account->find($account_id);

        if ($acc == null) {
            $this->response->setResponseFail();
            $this->response->setDescription('Could not find account with and id =' . $account_id);
        } else {
            if ($acc->delete()) {
                $this->response->setDescription('Account deleted successful');
            } else {
                $this->response->setResponseFail();
                $this->response->setDescription('Failed to delete an account');
            }
        }


        return array('response' => $this->response, 'data' => $returnObject);
    }
}