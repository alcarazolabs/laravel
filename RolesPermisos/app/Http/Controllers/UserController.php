<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\FreddyPermisos\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('haveaccess','user.index');

        $users = User::with('roles')->orderBy('id','Desc')->paginate(2);
        //return $users;

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Aplicar política al método "create"
        //$this->authorize('create', User::class);
        //return 'Create';

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //aplicar política:
        $this->authorize('view', [$user, ['user.show','userown.show']]);

        //obtener roles en orden ascendente.
        $roles = Role::orderBy('name')->get();
        //return $roles;
        return view('user.view', compact('roles','user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$this->authorize('update', $user);
        $this->authorize('update', [$user, ['user.edit','userown.edit']]);

        //obtener roles en orden ascendente.
        $roles = Role::orderBy('name')->get();
        //return $roles;
        return view('user.edit', compact('roles','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //realizar validaciones
        $request->validate([
            'name' => 'required|max:50|unique:users,name,'.$user->id,
            'email' => 'required|max:50|unique:users,email,'.$user->id,
        ]);
        //Actualizar usuario:
        //dd($request->all());

        $user->update($request->all());
        //actualizar relación:
        $user->roles()->sync( $request->get('roles') );
        //redireccionar:
        return redirect()->route('user.index')
        ->with('status_success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('haveaccess','user.destroy');
        //Eliminar user
       $user->delete();
       //redireccionar:
       return redirect()->route('user.index')
       ->with('status_success','User successfully removed!');
       
    }
}
