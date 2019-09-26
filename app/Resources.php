<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class resources extends Model
{
    //
    public $timestamps = false;
    use Eloquence;
    protected $table = 'resources';

    protected $guarded  = ['resourceId'];
    protected $searchableColumns = ['resourceValue'];


    public static function getbyCode($code) {

        $resourceArray=Resources::where('resourceCode',$code)->orderBy('order')->get();

        return $resourceArray;
    }

    public static function getbyCodeLike($code,$search) {

        $resourceArray=Resources::where('resourceCode',$code)->where('resourceValue', 'LIKE', '%'. $search. '%')->get();

        return $resourceArray;
    }
}
