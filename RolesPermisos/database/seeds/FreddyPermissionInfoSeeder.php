<?php

use Illuminate\Database\Seeder;

use App\User;
use App\FreddyPermisos\Models\Role;
use App\FreddyPermisos\Models\Permission;
use Illuminate\Support\Facades\Hash;
//Truncate
use Illuminate\Support\Facades\DB;


class FreddyPermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Desactivar todos los foreign keys:
        DB::statement("SET foreign_key_checks=0");
        //Hacer truncate a tablas sin modelo.
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        //truncate a tablas con modelo:
        Permission::truncate();
        Role::truncate();
        //habilitar los foreign keys:
        DB::statement("SET foreign_key_checks=1");

        //Crear usuario Admin
        $useradmin = User::where('email','admin@admin.com')->first();
        if($useradmin){
            $useradmin->delete();
        }
        $useradmin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);
        //Crear Role admin:
        $roladmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator',
            'full-access' => 'yes',
        ]);
        //Asignar el rol 'admin' al usuario 'admin'.
        //tabla role_user
        $useradmin->roles()->sync([ $roladmin->id ]);

        //Crear Role Registered User: (Agregado en la parte final)
        $rolregistereduser = Role::create([
            'name' => 'Registered User',
            'slug' => 'registereduser',
            'description' => 'Registered User',
            'full-access' => 'no',
        ]);

        //Crear array de permisos
        $permission_all = [];
        //permission_role
        $permission = Permission::create([
            'name' => 'List role',
            'slug' => 'role.index',
            'description' => 'An user can list a role',
        ]);
        
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show role',
            'slug' => 'role.show',
            'description' => 'An user can see a role',
        ]);
        
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create role',
            'slug' => 'role.create',
            'description' => 'An user can create a role',
        ]);
        
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit role',
            'slug' => 'role.edit',
            'description' => 'An user can Edit a role',
        ]);
        
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy role',
            'slug' => 'role.destroy',
            'description' => 'An user can destroy a role',
        ]);
        
        $permission_all[] = $permission->id;

        //Permiso para Users
        $permission = Permission::create([
            'name' => 'List user',
            'slug' => 'user.index',
            'description' => 'An user can list a user',
        ]);
        //asignar permiso de 'list user' al role 'registered user';
        $rolregistereduser->permissions()->sync([ $permission->id ]);
        
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show user',
            'slug' => 'user.show',
            'description' => 'An user can see a user',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit user',
            'slug' => 'user.edit',
            'description' => 'An user can Edit a user',
        ]);
        
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy user',
            'slug' => 'user.destroy',
            'description' => 'An user can destroy a user',
        ]);
        
        $permission_all[] = $permission->id;

        //permisos nuevos para politicas:
        $permission = Permission::create([
            'name' => 'Show own user',
            'slug' => 'userown.show',
            'description' => 'An user can see own user',
        ]);
        
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit own user',
            'slug' => 'userown.edit',
            'description' => 'An user can Edit own user',
        ]);

        /* 
        Laravel crea los usuarios, si la empresa ha eliminado la opción
        register entonces se habilita este permiso.
        $permission = Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'An user can create a user',
        ]);
        $permission_all[] = $permission->id;
        */
        //tabla permission_role

        // $roladmin->permissions()->sync( $permission_all );
        
    }
}
