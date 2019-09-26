<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Alloweduser extends Model
{

    public $table = 'allowedusers';
    


    public $fillable = [
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'phone' => 'required'
    ];
}
