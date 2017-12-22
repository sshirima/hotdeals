<?php

namespace App\Repositories;

use App\Models\SubCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version November 23, 2017, 9:50 am UTC
 *
 * @method SubCategory findWithoutFail($id, $columns = ['*'])
 * @method SubCategory find($id, $columns = ['*'])
 * @method SubCategory first($columns = ['*'])
 */
class SubCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subcat_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubCategory::class;
    }
}
