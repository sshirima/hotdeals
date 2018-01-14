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

class DeleteServiceController extends DeleteAdvertBaseController
{
    public function delete($id){
        $advert = ShowAdvertBaseController::getServiceAdvertById($id);

        return view('deleteadverts.delete-service')->with(['seller'=>auth()->user(),
            'advert'=>$advert]);
    }

    public function remove($id){
        $advert = Advert::find($id);
        $seller = auth()->user();

        //Check if seller is allowed to delete the advert
        if ($advert['seller_id'] == $seller->id){
            $this->deleteAdvertInfo($advert);
            $advert->service()->delete();
            $advert->delete();
            Flash::success('Service advert deleted successfully.');
            return redirect(route('seller.service-advert.show-all'));
        }
        Flash::error('Permission denied!');

        return redirect(route('seller.service-advert.show',$id));
    }

}