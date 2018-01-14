<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/12/2018
 * Time: 5:09 PM
 */

namespace App\Http\Controllers\DeleteAdverts;


use App\Http\Controllers\DisplayAdverts\ShowAdvertBaseController;
use App\Models\Advert;
use Laracasts\Flash\Flash;

class DeleteProductController extends DeleteAdvertBaseController
{
    public function delete($id){

        $advert = ShowAdvertBaseController::getProductAdvertById($id);

        return view('deleteadverts.delete-product')->with(['seller'=>auth()->user(),
            'advert'=>$advert]);
    }

    public function remove($id){

        $advert = Advert::find($id);
        $seller = auth()->user();

        //Check if seller is allowed to delete the advert
        if ($advert['seller_id'] == $seller->id){
            $this->deleteAdvertInfo($advert);
            $advert->product()->delete();
            $advert->delete();
            Flash::success('Product advert deleted successfully.');
            return redirect(route('seller.product-advert.show-all'));
        }
        Flash::error('Permission denied!');

        return redirect(route('seller.product-advert.show',$id));
    }
}