<?php

use Illuminate\Support\Facades\Route;

use App\FreddyPermisos\Models\Role;
use App\User;
use App\FreddyPermisos\Models\Permission;

use Illuminate\Support\Facades\Gate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/role', 'RoleController')->names('role');
/*
Route::resource('/user', 'UserController', ['except'=>[
    'create', 'store']])->names('user');
*/
Route::resource('/user', 'UserController', ['except'=>[
    'create','store']])->names('user');

Route::get('/test', function () {
    $user = User::find(2);
    //$user->roles()->sync([ 2 ]);
    Gate::authorize('haveaccess','role.show');

    return $user;
    //return $user->havePermission('role.create');
});
