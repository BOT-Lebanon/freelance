<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    //
    protected $table = 'role_users';

   // public function user() {
   //     return $this->belongsTo( User::class,'Id','user_id' );
   // }

   // public function RoleName() {
   //     return $this->belongsTo( Roles::class,'id','role_id' );
   // }
}
