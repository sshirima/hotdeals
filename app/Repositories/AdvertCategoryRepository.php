<?php

namespace App\Repositories;

use App\Models\AdvertCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version November 22, 2017, 9:46 pm UTC
 *
 * @method Region findWithoutFail($id, $columns = ['*'])
 * @method Region find($id, $columns = ['*'])
 * @method Region first($columns = ['*'])
 */
class AdvertCategoryRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AdvertCategory::class;
    }
}
