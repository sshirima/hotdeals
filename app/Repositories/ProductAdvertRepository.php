<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/25/2017
 * Time: 7:56 AM
 */

namespace App\Repositories;


use App\Models\ProductAdvert;
use InfyOm\Generator\Common\BaseRepository;

class ProductAdvertRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'expiredate',
        'name',
        'brand',
        'model'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductAdvert::class;
    }
}