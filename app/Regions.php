<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Regions extends Model
{
    use SoftDeletes;

    public $table = 'regions';
    

    protected $dates = ['deleted_at'];
	protected $primaryKey = 'regionId';

    public $fillable = [
		'regionId',
        'region_name',
        'region_nameAra',
        'kadaaId'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'regionId' => 'integer',
        'region_name' => 'string',
        'region_nameAra' => 'string',
        'kadaaId' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function Churches()
    {
        return $this->hasMany('App\Models\Chuches', 'regionId');
    }

    public function existChurches()
    {
        return ;
    }



}
