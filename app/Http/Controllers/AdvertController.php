<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;
use App\Repositories\AdvertRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AdvertController extends AppBaseController
{
    /** @var  AdvertRepository */
    private $advertRepository;

    public function __construct(AdvertRepository $advertRepo)
    {
        $this->advertRepository = $advertRepo;
    }

    /**
     * Display a listing of the Advert.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->advertRepository->pushCriteria(new RequestCriteria($request));
        $adverts = $this->advertRepository->all();

        return view('adverts.index')
            ->with('adverts', $adverts);
    }

    /**
     * Show the form for creating a new Advert.
     *
     * @return Response
     */
    public function create()
    {
        return view('adverts.create');
    }

    /**
     * Store a newly created Advert in storage.
     *
     * @param CreateAdvertRequest $request
     *
     * @return Response
     */
    public function store(CreateAdvertRequest $request)
    {
        $input = $request->all();

        $advert = $this->advertRepository->create($input);

        Flash::success('Advert saved successfully.');

        return redirect(route('adverts.index'));
    }

    /**
     * Display the specified Advert.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $advert = $this->advertRepository->findWithoutFail($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('adverts.index'));
        }

        return view('adverts.show')->with('advert', $advert);
    }

    /**
     * Show the form for editing the specified Advert.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $advert = $this->advertRepository->findWithoutFail($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('adverts.index'));
        }

        return view('adverts.edit')->with('advert', $advert);
    }

    /**
     * Update the specified Advert in storage.
     *
     * @param  int $id
     * @param UpdateAdvertRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdvertRequest $request)
    {
        $advert = $this->advertRepository->findWithoutFail($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('adverts.index'));
        }

        $advert = $this->advertRepository->update($request->all(), $id);

        Flash::success('Advert updated successfully.');

        return redirect(route('adverts.index'));
    }

    /**
     * Remove the specified Advert from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $advert = $this->advertRepository->findWithoutFail($id);

        if (empty($advert)) {
            Flash::error('Advert not found');

            return redirect(route('adverts.index'));
        }

        $this->advertRepository->delete($id);

        Flash::success('Advert deleted successfully.');

        return redirect(route('adverts.index'));
    }
}
