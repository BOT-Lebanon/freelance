<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class kadaa extends Model
{
    //use SoftDeletes;
    public $table = 'kadaa';
    protected $primaryKey = 'Id';
    protected $searchableColumns = ['Name'];

    public $fillable = [
		'Id',
        'provinceId',
        'Name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'Id' => 'integer',
        'Name' => 'string',
        'provinceId' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function city() {
        return $this->hasMany( city::class,'KadaaId','Id' );
    }
}
