<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function scopeNombres($query, $nombre){
        if($nombre){
            return $query->where('nombre','like',"%$nombre%");
        }
     
    }
    
    /*
       public function producto(){
        return $this->hasMany(Producto::class);
    
    }*/

}
