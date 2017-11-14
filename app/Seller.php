<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Seller extends Model
{
    //
    public static $SELLER_ID = 'slr_id';
    public static $SELLER_PHONENUMBER = 'slr_phonenumber';
    public static $SELLER_FK_ACC_ID = 'fk_acc_id';
    public $timestamps = false;
    protected $table = 'sellers';
    protected $primaryKey = 'slr_id';
    private $accountManager;
    private $sellerModel;
    private $sellerAccountId;

    public function addNewSeller(Request $request)
    {
        $returnResponse = null;
        $returnData = null;
        $accountManagerResponse = $this->saveSellerAccount($request);

        if ($accountManagerResponse['data'] == null) {
            $returnResponse = $accountManagerResponse['response'];
        } else {
            //Add seller
            $returnData = $this->insertSeller($accountManagerResponse, $request);
            $returnResponse = $accountManagerResponse['response'];
            $returnResponse->description = 'Seller account successful created';
        }
        return array('response' => $returnResponse, 'data' => $returnData);
    }

    /**
     * @param $request
     * @return array
     */
    public function saveSellerAccount($request)
    {
        $this->initializeAccountManager();
        $response = $this->accountManager->addSellerAccount($request);
        return $response;
    }

    /**
     * Initializes account manager for seller account operations
     */
    public function initializeAccountManager()
    {
        $this->accountManager = new AccountManager();
    }

    /**
     * @param $response
     * @param $request
     * @return Seller|null
     */
    public function insertSeller($response, $request)
    {
        $returnObject = null;
        $this->initializesSeller();

        $account = $response['data'];

        $seller = Seller::fillParams($this->sellerModel,
            [Seller::$SELLER_PHONENUMBER => $request->attributes->get(Seller::$SELLER_PHONENUMBER),
                Seller::$SELLER_FK_ACC_ID => $account['attributes'][Account::$ACCOUNT_ID]
            ]);
        if ($seller->save()) {
            $returnObject = $seller;
        } else {
            $returnObject = null;
        }
        return $returnObject;
    }

    /**
     * Initializes seller instance
     */
    public function initializesSeller()
    {
        $this->sellerModel = new Seller();
    }

    /**
     * @param Seller $seller
     * @param array $params
     * @return Seller
     */
    public static function fillParams(Seller $seller, array $params)
    {
        $seller->setAttribute(Seller::$SELLER_FK_ACC_ID, $params[Seller::$SELLER_FK_ACC_ID]);
        $seller->setAttribute(Seller::$SELLER_PHONENUMBER, $params[Seller::$SELLER_PHONENUMBER]);

        return $seller;
    }

    public function updateSellerInfo(Request $request)
    {
        $returnResponse = null;
        $returnData = null;

        $accountManagerResponse = $this->updateSellerAccount($request);

        if ($accountManagerResponse['data'] == null) {
            $returnResponse = $accountManagerResponse['response'];
        } else {
            //Edit seller information
            $returnData = $this->editSeller($accountManagerResponse, $request);
            $returnResponse = $accountManagerResponse['response'];
            $returnResponse->description = 'Seller account successful updated';
        }
        return array('response' => $returnResponse, 'data' => $returnData);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function updateSellerAccount(Request $request)
    {
        $this->initializeAccountManager();
        $response = $this->accountManager->updateSellerAccount($request);
        return $response;
    }

    /**
     * @param $response
     * @param $request
     * @return Seller|null
     */
    public function editSeller($response, $request)
    {
        $returnObject = null;
        $this->initializesSeller();

        $account = $response['data'];

        $sel = $this->sellerModel->find($request->attributes->get(Seller::$SELLER_ID));

        if ($sel == null) {
            $returnObject = null;
        } else {
            $seller = Seller::fillParams($sel,
                [Seller::$SELLER_PHONENUMBER => $request->attributes->get(Seller::$SELLER_PHONENUMBER),
                    Seller::$SELLER_FK_ACC_ID => $account['attributes'][Account::$ACCOUNT_ID]]);
            if ($seller->update()) {
                $returnObject = $seller;
            } else {
                $returnObject = null;
            }
        }


        return $returnObject;
    }

    /**
     * @param $seller_id
     * @return array
     */
    public function deleteSellerInfo($seller_id)
    {
        $returnResponse = null;
        $returnData = null;

        $returnData = $this->deleteSeller($seller_id);

        if ($returnData == null) {
            $res = $this->setFailResponse('Fail to delete seller OR {seller_id} not found');
            $returnResponse = $res;
        } else {
            $accountManagerResponse = $this->deleteSellerAccount($this->sellerAccountId);
            if ($accountManagerResponse['response']->code == 'OK') {
                $returnResponse = $accountManagerResponse['response'];
            } else {
                $res = $this->setFailResponse('Fail to delete sellerAccount');
                $returnResponse = $res;
            }
        }
        return array('response' => $returnResponse, 'data' => $returnData);
    }

    /**
     * @param $seller_id
     * @return Seller|null
     */
    public function deleteSeller($seller_id)
    {

        $this->initializesSeller();

        $sel = $this->sellerModel->find($seller_id);

        if ($sel == null) {
            $returnObject = null;
        } else {
            $this->sellerAccountId = $sel[Seller::$SELLER_FK_ACC_ID];
            $returnObject = $sel;
            $sel->delete();
        }

        return $returnObject;
    }

    /**
     * @param $message
     * @return Response
     */
    public function setFailResponse($message)
    {
        $res = new Response();
        $res->setResponseFail();
        $res->setStatus(Response::$STATUS_BAD_REQUEST);
        $res->setDescription($message);
        return $res;
    }

    /**
     * @param $seller_id
     * @return array
     */
    public function deleteSellerAccount($seller_id)
    {
        $this->initializeAccountManager();
        $response = $this->accountManager->deleteAccount($seller_id);
        return $response;
    }
}



