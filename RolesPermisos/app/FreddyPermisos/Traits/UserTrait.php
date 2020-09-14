<?php

namespace App\FreddyPermisos\Traits;

trait UserTrait{
    //UserTrait

        //es. desde aqui
    //en. from here
    public function roles(){
        //relación muchos a muchos.
        return $this->belongsToMany('App\FreddyPermisos\Models\Role')->withTimesTamps();
    }

    public function havePermission($permission){
        //logica
        //Esto verifica si el usuario tiene uno o mas roles asignados.
            foreach($this->roles as $role){
                if($role['full-access']=='yes'){
                    return true;
                }
            //verificar si el role tiene un permiso asignado
            foreach($role->permissions as $perm){
                if($perm->slug == $permission){
                    return true;
                }
            }
        
        }
        return false;
        //return $this->roles;

    }

}