<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRateRequest;
use App\Repositories\RateRepository;
use Laracasts\Flash\Flash;

class RateController extends Controller
{
    /**
     * @var RateRepository
     */
    private $rateRepository;

    /**
     * RateController constructor.
     * @param RateRepository $rateRepository
     */
    public function __construct(RateRepository $rateRepository)
    {
        $this->middleware('auth');
        $this->rateRepository = $rateRepository;
    }

    /**
     * @param CreateRateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateRateRequest $request)
    {

        $input = $request->all();

        $rate = \DB::table('rates')
            ->whereColumn([
                ['user_id', '=', \DB::raw($input['user_id'])],
                ['advert_id', '=', \DB::raw($input['advert_id'])]
            ])->first();

        if (!empty($rate)) {
            //Update the rating
            $this->rateRepository->update($input, $rate->id);

            return redirect(route('user.product-advert.show', $input['advert_id']));
        }

        $this->rateRepository->create($input);

        Flash::success('Rated...');

        return redirect(route('user.product-advert.show', $input['advert_id']));

    }
}
