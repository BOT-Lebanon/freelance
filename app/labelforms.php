<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class labelforms extends Model
{
    //
    use Eloquence;
    protected $table = 'labelsforms';
    protected $guarded  = ['labelcode'];
    protected $searchableColumns = ['labelcode'];
}
