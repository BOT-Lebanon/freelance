<?php

namespace App\Repositories;

use App\City;
use InfyOm\Generator\Common\BaseRepository;

class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'KadaaId'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return City::class;
    }
}
