<?php

namespace App\Repositories;

use App\Models\Service;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductRepository
 * @package App\Repositories
 * @version November 24, 2017, 12:09 am UTC
 *
 * @method Service findWithoutFail($id, $columns = ['*'])
 * @method Service find($id, $columns = ['*'])
 * @method Service first($columns = ['*'])
 */
class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'srv_name',
        'srv_brand',
        'p_cost',
        'c_cost'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }
}
