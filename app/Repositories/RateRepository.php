<?php

namespace App\Repositories;

use App\Models\Rate;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version November 22, 2017, 9:46 pm UTC
 *
 * @method Rate findWithoutFail($id, $columns = ['*'])
 * @method Rate find($id, $columns = ['*'])
 * @method Rate first($columns = ['*'])
 */
class RateRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rate::class;
    }
}
