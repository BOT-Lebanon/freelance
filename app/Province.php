<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Province extends Model
{
	use Eloquence;
    protected $table = 'province';
    protected $guarded  = ['Id'];
    protected $searchableColumns = ['Name'];

    public function kadaa() {
        return $this->hasMany( kadaa::class,'provinceId','Id' );
    }
}
