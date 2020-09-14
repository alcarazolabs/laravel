<?php

namespace App\FreddyPermisos\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function roles(){
        //relación muchos a muchos.
        return $this->belongsToMany('App\FreddyPermisos\Models\Role')->withTimesTamps();
    }
}