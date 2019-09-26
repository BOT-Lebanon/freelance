<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class City extends Model
{

    public $table = 'city';
    


    public $fillable = [
        'Id',
        'Name',
        'KadaaId'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required'
    ];
}
