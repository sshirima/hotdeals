<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateSubCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\SubCategory;
use App\Repositories\CategoryRepository;
use App\Repositories\SubCategoryRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SubCategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $subcategoryRepository;

    public function __construct(SubCategoryRepository $subcategoryRepository)
    {
        $this->middleware('auth:admin');
        $this->subcategoryRepository = $subcategoryRepository;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subcategoryRepository->pushCriteria(new RequestCriteria($request));
        $subcategories = $this->subcategoryRepository->all();

        return view('subcategories.index')
            ->with(['subcategories' => $subcategories, 'admin' => auth()->user()]);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('subcategories.create')->with(['admin' => auth()->user()]);
    }

    /**
     * @param CreateSubCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateSubCategoryRequest $request)
    {
        $input = $request->all();

        $subcategory = $this->subcategoryRepository->create($input);

        Flash::success('Subcategory saved successfully.');

        return redirect(route('subcategories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);

        if (empty($subcategory)) {
            Flash::error('SubCategory not found');

            return redirect(route('subcategories.index'));
        }

        return view('subcategories.show')->with(['subcategory' => $subcategory, 'admin' => auth()->user()]);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);

        if (empty($subcategory)) {
            Flash::error('SubCategory not found');

            return redirect(route('subcategories.index'));
        }

        return view('subcategories.edit')->with(['subcategory' => $subcategory, 'admin' => auth()->user()]);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubCategoryRequest $request)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);

        if (empty($subcategory)) {
            \Laracasts\Flash\Flash::error('Category not found');

            return redirect(route('subcategories.index'));
        }

        $subcategory = $this->subcategoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        return redirect(route('subcategories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);

        if (empty($subcategory)) {
            Flash::error('Category not found');

            return redirect(route('subcategories.index'));
        }

        $this->subcategoryRepository->delete($id);

        \Laracasts\Flash\Flash::success('Category deleted successfully.');

        return redirect(route('subcategories.index'));
    }
}
