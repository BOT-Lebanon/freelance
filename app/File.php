<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model{

    protected $table = 'files';
    protected $public="/home/bot/public_html/";
    protected $guarded  = ['id'];

    public  function getPublicPath() {
        return $this->public;

    }
}
