<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    //

    protected $table = 'chemicals';

    public function drug()
    {
        return $this->belongsTo('App\Drug');
    }
   
}
