<?php 
Route::get('/test', function (){
    /* 
     return Role::create([
         'name' => 'Admin',
         'slug' => 'admin',
         'description' => 'Administrator',
         'full-access' => 'yes',
     ]);
     
 
   
     return Role::create([
         'name' => 'Guest',
         'slug' => 'guest',
         'description' => 'guest',
         'full-access' => 'no',
     ]);
     
     return Role::create([
         'name' => 'Test',
         'slug' => 'test',
         'description' => 'test',
         'full-access' => 'no',
     ]);
 
     $user = User::find(1);
     //$user->roles()->attach([1,2,3]);
     //$user->roles()->detach([3]);
     $user->roles()->sync([1,3]);
     return $user->roles;
     */
     /*
     return Permission::create([
         'name' => 'List Product',
         'slug' => 'product.index',
         'description' => 'An user can list a permission',
     ]);
     */
     //$user->roles()->sync([1,3]);
 
     $role = Role::find(2);
     $role->permissions()->sync([3,4]);
     return $role->permissions;
 
    
 });
 
 
 
 