<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Country extends Model
{

    public $table = 'countries';
    


    public $fillable = [
        'name',
        'sortname'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'sortname' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
}
