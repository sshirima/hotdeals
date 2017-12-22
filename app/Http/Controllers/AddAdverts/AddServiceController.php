<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/14/2017
 * Time: 2:40 PM
 */

namespace App\Http\Controllers\AddAdverts;


use App\Http\Requests\CreateServiceAdvertRequest;
use App\Repositories\AdvertRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\RegionRepository;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;

class AddServiceController extends AddAdvertBaseController
{
    private $advertsRepo;
    private $regionRepo;
    private $categoryRepo;

    /**
     * AddProductController constructor.
     * @param AdvertRepository $advertRepository
     * @param RegionRepository $regionRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(AdvertRepository $advertRepository, RegionRepository $regionRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
        $this->categoryRepo = $categoryRepository;
        $this->regionRepo = $regionRepository;
    }


    /**
     * @return $this
     */
    public function create()
    {

        return view('addeditadverts.service-create')->with(['seller' => auth()->user(),
            'regions' => $this->regionRepo->get(), 'categories' => $this->categoryRepo->get()]);
    }

    /**
     * @param CreateServiceAdvertRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateServiceAdvertRequest $request)
    {
        if ($request->has('subcat_id')) {
            $subcategories = $request['subcat_id'];
            $category = Category::find($request['category_id']);
            foreach ($subcategories as $subcategory) {
                $category->subcategories()->attach($subcategory);
            }
        }

        $input = $request->all();

        $advert = $this->advertsRepo->create($input);

        $advert->service()->create($input);

        if ($request->hasFile('img_name')) {
            $images = $request->file('img_name');
            $i = 0;
            foreach ($images as $image) {
                $filename = time() . $i . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(900, 600)->save($location);
                $input['img_name'] = $filename;
                $advert->images()->create($input);
                $i++;
            }
        }

        $advert->location()->create($input);

        $advert->categories()->attach($input['category_id']);

        Flash::success('Advert saved successfully.');

        return redirect(route('seller.service-advert.show-all'));
    }
}