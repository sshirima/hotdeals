<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/14/2017
 * Time: 6:57 PM
 */

namespace App\Http\Controllers\EditAdverts;


use App\Http\Requests\UpdateServiceAdvertRequest;
use App\Models\Category;
use App\Models\Region;
use App\Models\SubCategory;
use App\Repositories\AdvertRepository;
use Intervention\Image\Facades\Image;

class EditServiceController extends EditAdvertBaseController
{
    private $advertsRepo;

    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
    }

    public function edit($id)
    {

        $advert = $this->advertsRepo->findWithoutFail($id);

        $advert['service'] = $advert->service()->select(['srv_name', 'srv_brand', 'p_cost', 'c_cost'])->first();

        $advert = $this->getAdvertInfo($advert);

        return view('addeditadverts.service-edit')->with([
            'seller' => auth()->user(),
            'advert' => $advert,
            'regions' => Region::all(),
            'categories' => Category::where('cat_type','like','Service')->get(),
            'subcategories' => SubCategory::all()
        ]);
    }

    /**
     * @param $id
     * @param UpdateServiceAdvertRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateServiceAdvertRequest $request)
    {
        $input = $request->all();

        $advert = $this->advertsRepo->update($input, $id);

        $advert->service()->first()->update( $input);

        $this->updateAdvert($request, $advert);

        return redirect(route('seller.service-advert.show', $id));
    }

}