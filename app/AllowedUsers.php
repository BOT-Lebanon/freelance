<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class AllowedUsers extends Model
{
    use Eloquence;
    protected $table = 'allowedusers';
    protected $guarded  = ['id'];
    protected $searchableColumns = ['phone'];

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

    public static function findbyPhone($phone) {
        $id='';
        $userRow=AllowedUsers::where('phone',$phone)->first();

        if($userRow)
            $id=$userRow->id;

        return $id;
    }
}
