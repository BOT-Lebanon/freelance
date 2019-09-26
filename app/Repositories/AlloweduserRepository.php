<?php

namespace App\Repositories;

use App\Models\Alloweduser;
use InfyOm\Generator\Common\BaseRepository;

class AlloweduserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alloweduser::class;
    }
}
