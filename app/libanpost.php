<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class libanpost extends Model
{
    //
    use Eloquence;
    protected $table = 'libanpost';
    protected $guarded  = ['code'];
    protected $searchableColumns = ['code'];

    public function users() {
        return $this->hasMany( User::class );
    }
}
