<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/14/2017
 * Time: 6:57 PM
 */

namespace App\Http\Controllers\EditAdverts;


use App\Http\Requests\UpdateProductAdvertRequest;
use App\Http\Requests\UpdateServiceAdvertRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\AdvertRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\RegionRepository;
use Intervention\Image\Facades\Image;

class EditServiceController extends EditAdvertBaseController
{
    private $advertsRepo;
    private $regionRepo;
    private $categoryRepo;

    public function __construct(AdvertRepository $advertRepository, RegionRepository $regionRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->middleware('auth:seller');
        $this->advertsRepo = $advertRepository;
        $this->regionRepo = $regionRepository;
        $this->categoryRepo = $categoryRepository;
    }

    public function edit($id)
    {

        $advert = $this->advertsRepo->findWithoutFail($id);

        $advert['service'] = $advert->service()->select(['srv_name', 'srv_brand', 'p_cost', 'c_cost'])->first();

        $location = $advert->location()->select(['region_id'])->first();

        $advert['categories'] = $advert->categories()->get();

        $advert['region'] = $location->region()->first();

        return view('addeditadverts.service-edit')->with([
            'seller' => auth()->user(),
            'advert' => $advert,
            'regions' => $this->regionRepo->get(),
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

        $service = $advert->service()->first()->update($input);

        $advert->categories()->detach();
        $advert->categories()->attach($input['category_id']);

        $location = $advert->location()->first()->update($input);

        if ($request->hasFile('img_name')) {
            $images = $request->file('img_name');
            $i = 0;
            $previousImages = $advert->images()->get();
            foreach ($images as $image) {
                $filename = time() . $i . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(900, 600)->save($location);
                $input['img_name'] = $filename;
                $saveImageInfo = $advert->images()->create($input);
                $i++;
            }

            //Deleting old images
            foreach ($previousImages as $image) {
                $image->forceDelete();
                \Storage::delete($image->img_name);
            }
        }

        return redirect(route('seller.service-advert.show', $id));
    }

}