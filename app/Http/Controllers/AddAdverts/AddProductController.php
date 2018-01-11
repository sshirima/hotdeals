<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/14/2017
 * Time: 2:40 PM
 */

namespace App\Http\Controllers\AddAdverts;


use App\Http\Requests\CreateProductAdvertRequest;
use App\Models\Category;
use App\Models\Region;
use App\Models\SubCategory;
use App\Repositories\AdvertRepository;
use Laracasts\Flash\Flash;

class AddProductController extends AddAdvertBaseController
{
    private $advertsRepo;

    /**
     * AddProductController constructor.
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

        return view('addeditadverts.product-create')->with(['seller' => auth()->user(),
            'regions' => Region::all(),
            'categories' => Category::where('cat_type','like','Product')->get(),
            'subcategories' => SubCategory::all()]);
    }

    /**
     * @param CreateProductAdvertRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateProductAdvertRequest $request)
    {
        $advert = $this->storeAdvertInfo($this->advertsRepo, $request);

        $advert->product()->create($request->all());

        Flash::success('Product advert saved successfully.');

        return redirect(route('seller.product-advert.show-all'));
    }
}