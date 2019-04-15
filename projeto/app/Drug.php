<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $table = 'drugs';

    public function chemical()
    {
        return $this->hasOne('App\Chemical');
    }
}