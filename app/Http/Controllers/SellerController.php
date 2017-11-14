<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/12/2017
 * Time: 12:18 AM
 */

namespace App\Http\Controllers;


use App\Seller;
use Illuminate\Http\Request;
use App\AccountGroup;

class SellerController extends Controller
{
    private $sellerModel;

    public function registerSellerAccount()
    {
        $this->initializesSellerModel();
        //Add account
        $request = new Request();

        $request->attributes
            ->add(['acc_fname' => 'Samson', 'acc_lname' => 'Shirima', 'acc_email' => 'sshirima@gmail.com',
                'acc_password' => 'password', 'fk_grp_id' => AccountGroup::$DEFAULT_LEVEL_SELLER,
                'acc_login' => false, 'acc_active' => false, 'slr_phonenumber' => '0754710618']);

        return $this->sellerModel->addNewSeller($request);;
    }

    private function initializesSellerModel()
    {
        $this->sellerModel = new Seller();
    }

    public function updateSellerAccount()
    {
        $this->initializesSellerModel();
        //Update account
        $request = new Request();

        $request->attributes
            ->add(['acc_id' => 2, 'acc_fname' => 'Samson', 'acc_lname' => 'Shirima', 'acc_email' => 'sshirima@gmail.com',
                'acc_password' => 'changePassword', 'fk_grp_id' => AccountGroup::$DEFAULT_LEVEL_SELLER,
                'acc_login' => false, 'acc_active' => true, 'slr_phonenumber' => '07659000000', 'slr_id' => 2]);

        //Validate the input parameters

        //Hashing account password

        //Update seller
        $seller = new Seller();

        return $this->sellerModel->updateSellerInfo($request);
    }

    public function deleteSeller()
    {
        $this->initializesSellerModel();
        $request = new Request();

        $request->attributes->add(['slr_id' => 4]);

        $id = $request->attributes->get(Seller::$SELLER_ID);

        return $this->sellerModel->deleteSellerInfo($id);
    }


}