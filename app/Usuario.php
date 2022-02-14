<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posteo;

class Usuario extends Model
{
    public function posteos(){
        return $this->hasMany(Posteo::class);
    }//
}
