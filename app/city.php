<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class city extends Model
{
    //
    use Eloquence;
    protected $table = 'city';
    protected $guarded  = ['Id'];
    protected $searchableColumns = ['Name'];
    public $timestamps=false;

    protected $fillable = ['Name','Id','KadaaId'];

    public function Kadaa() {
        return $this->belongsTo( 'App\Kadaa','KadaaId','Id' );
    }
}
