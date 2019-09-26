<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = 'roles';

    public function user() {
        return $this->belongsTo( User::class,'Id','provinceId' );
    }
}
