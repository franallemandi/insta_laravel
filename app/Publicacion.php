<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Publicacion extends Model
{
    public function publicaciones(){
        return $this->hasMany(Usuario::class);
    }//
}
