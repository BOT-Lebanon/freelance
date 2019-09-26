<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Resource extends Model
{

    public $table = 'resources';
    

    protected $primaryKey = 'resourceId';

    public $fillable = [
        'resourceCode',
        'resourceValue'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'resourceCode' => 'string',
        'resourceValue' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'resourceCode' => 'required',
        'resourceValue' => 'required'
    ];
}
