<?php

namespace App\Repositories;

use App\Models\Advert;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdvertRepository
 * @package App\Repositories
 * @version November 23, 2017, 10:49 am UTC
 *
 * @method Advert findWithoutFail($id, $columns = ['*'])
 * @method Advert find($id, $columns = ['*'])
 * @method Advert first($columns = ['*'])
 */
class AdvertRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'expiredate'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Advert::class;
    }
}
