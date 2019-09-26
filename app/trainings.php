<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class trainings extends Model
{
    //
    use Eloquence;
    protected $table = 'usertrainings';
    protected $guarded  = ['trainingId'];
    protected $searchableColumns = ['name'];
    protected $fillable =['institution','course','year','userId'];
}
