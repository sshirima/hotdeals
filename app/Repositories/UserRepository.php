<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version November 22, 2017, 9:46 pm UTC
 *
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name', 'last_name', 'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
