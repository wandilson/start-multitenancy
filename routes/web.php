<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\{
    UserCreate,
    UserEdit,
    UserList
};
use App\Http\Livewire\Acl\Permissions\{
    PermissionList,
    PermissionCreate,
    PermissionEdit
};
use App\Http\Livewire\Acl\Modules\{
    ModuleList,
    ModuleCreate,
    ModuleEdit
};
use App\Http\Livewire\Acl\Roles\{
    RoleList,
    RoleCreate,
    RoleEdit
};

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('config')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/users', UserList::class)->name('users');
    Route::get('/users/create', UserCreate::class)->name('users.create');
    Route::get('/users/edit/{id}', UserEdit::class)->name('users.edit');

    // Modules
    Route::get('/modules', ModuleList::class)->name('modules');
    Route::get('/modules/create', ModuleCreate::class)->name('modules.create');
    Route::get('/modules/edit/{id}', ModuleEdit::class)->name('modules.edit');
    Route::get('/module/{id}/permission', PermissionList::class)->name('module.permissions'); // Lista as permissões do móduli selecionado
    Route::get('/module/{id}/permission/create', PermissionCreate::class)->name('module.permissions.create'); // Lista as permissões do móduli selecionado

        // Perissions
        Route::get('/permissions/create', PermissionCreate::class)->name('permissions.create');
        Route::get('/permissions/edit/{id}', PermissionEdit::class)->name('permissions.edit');
   
    
    // Funções Administrativas
    Route::get('/roles', RoleList::class)->name('roles');
    Route::get('/roles/create', RoleCreate::class)->name('roles.create');
    Route::get('/roles/edit/{id}', RoleEdit::class)->name('roles.edit');

});