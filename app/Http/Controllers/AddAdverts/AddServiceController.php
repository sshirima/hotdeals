<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/14/2017
 * Time: 2:40 PM
 */

namespace App\Http\Controllers\AddAdverts;


use App\Http\Requests\CreateServiceAdvertRequest;
use App\Models\Category;
use App\Models\Region;
use App\Models\SubCategory;
use App\Repositories\AdvertRepository;
use Laracasts\Flash\Flash;

class AddServiceController extends AddAdvertBaseController
{
    private $advertsRepo;

    /**
     * AddServiceController constructor.
     * @param AdvertRepository $advertRepository
     */
    public function __construct(AdvertRepository $advertRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
    }


    /**
     * @return $this
     */
    public function create()
    {

        return view('addeditadverts.service-create')->with(['seller' => auth()->user(),
            'regions' => Region::all(),
            'categories' => Category::where('cat_type','like','Service')->get(),
            'subcategories' => SubCategory::all()]);
    }

    /**
     * @param CreateServiceAdvertRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateServiceAdvertRequest $request)
    {
        $advert = $this->storeAdvertInfo($this->advertsRepo, $request);

        $advert->service()->create($request->all());

        Flash::success('Service advert saved successfully.');

        return redirect(route('seller.service-advert.show-all'));
    }
}