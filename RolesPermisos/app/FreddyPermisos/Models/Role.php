<?php

namespace App\FreddyPermisos\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //es. desde aqui
    //en. from here
    protected $fillable = [
        'name', 'slug', 'description','full-access',
    ];
    public function users(){
        //relación muchos a muchos.
        return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permissions(){
        //relación muchos a muchos.
        return $this->belongsToMany('App\FreddyPermisos\Models\Permission')->withTimesTamps();
    }

}
