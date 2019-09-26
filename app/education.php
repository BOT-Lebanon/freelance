<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class education extends Model
{
    //
    use Eloquence;
    protected $table = 'usereducation';
    protected $guarded  = ['Id'];
    protected $searchableColumns = ['name'];
    protected $fillable =['institution','major','year','userId'];


}
