<?php
/**
 * Created by PhpStorm.
 * User: sshirima
 * Date: 11/11/2017
 * Time: 10:20 AM
 */

namespace App\Http\Controllers;

use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;
use App\Account;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function addAccount(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'acc_fname' => 'Rose',
                'acc_lname' => 'Masae',
                'acc_email' => 'rose.masae@vodacom.com',
                'acc_password' => 'password',
                'acc_login' => false,
                'acc_active' => false,
                'fk_grp_id' => 2
            ]);

        return Account::addModel(new Account(), $request->attributes->all());
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function updateAccount(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'acc_id' => 34,
                'acc_fname' => 'Rose',
                'acc_lname' => 'Masae',
                'acc_email' => 'rose.masae@vodacom.com',
                'acc_password' => 'password',
                'acc_login' => false,
                'acc_active' => false,
                'fk_grp_id' => 3
            ]);
        $params = $request->attributes->all();

        $id = $params[Account::$ACCOUNT_ID];

        $account = self::getAccountById($id);

        $account instanceof Account ? $response = Account::updateModel($account, $params) : $response = $account;

        return $response;
    }

    /**
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function deleteAccount()
    {
        $id = 1;

        $account = self::getAccountById($id);

        $account instanceof Account ? $response = Account::deleteModel($account) : $response = $account;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getAccountById($id)
    {

        try {
            return Account::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }
}