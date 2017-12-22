<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 12/14/2017
 * Time: 6:57 PM
 */

namespace App\Http\Controllers\EditAdverts;


use App\Http\Requests\UpdateProductAdvertRequest;
use App\Repositories\AdvertRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\RegionRepository;
use Intervention\Image\Facades\Image;

class EditProductController extends EditAdvertBaseController
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

        $advert['product'] = $advert->product()->select(['name', 'brand', 'model', 'manufacturer', 'p_cost', 'c_cost'])->first();

        $location = $advert->location()->select(['region_id'])->first();

        $advert['categories'] = $advert->categories()->get();

        $advert['region'] = $location->region()->first();

        return view('addeditadverts.product-edit')->with([
            'seller' => auth()->user(),
            'advert' => $advert,
            'regions' => $this->regionRepo->get(),
            'categories' => $this->categoryRepo->get()
        ]);
    }

    /**
     * @param $id
     * @param UpdateProductAdvertRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateProductAdvertRequest $request)
    {
        $input = $request->all();

        $advert = $this->advertsRepo->update($input, $id);

        $advert->product()->first()->update($input);

        $advert->categories()->detach();

        $advert->categories()->attach($input['category_id']);

        $advert->location()->first()->update($input);

        if ($request->hasFile('img_name')) {
            $images = $request->file('img_name');
            $i = 0;
            $previousImages = $advert->images()->get();
            foreach ($images as $image) {
                $filename = time() . $i . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(900, 600)->save($location);
                $input['img_name'] = $filename;
                $advert->images()->create($input);
                $i++;
            }

            foreach ($previousImages as $image) {
                $image->forceDelete();
                \Storage::delete($image->img_name);
            }
        }

        return redirect(route('seller.product-advert.show', $id));
    }

}