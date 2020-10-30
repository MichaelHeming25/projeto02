<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Controller@index');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->group(function () {

    //Routes Login
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.acessar');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/recuperarsenha', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.recuperar.senha');

    Route::get('/home', 'admin\principalController@index')->name('admin.home');

    // visualizar usuarios
    Route::get('/usuarios', 'admin\usuariosController@index')->name('admin.usuarios');
    Route::get('/usuarios/listar', 'admin\usuariosController@listar')->name('usuarios.listar');
    // visualizar cadastro
    Route::get('/usuarios/viewCadastrar', 'admin\usuariosController@viewCadastro')->name('usuarios.cadastrar');
    // cadastrado
    Route::post('/usuarios/cadastrado', 'admin\usuariosController@cadastrado')->name('usuarios.cadastrado');
    //Editar usuarios
    Route::get('/usuarios/editar/{id}', 'admin\usuariosController@editarUsuario')->name('usuarios.editar');
    Route::post('/usuarios/editar/salvar/{id}', 'admin\usuariosController@editarSalvar');
    //Remover usuarios
    Route::get('/usuarios/remover/{id}', 'admin\usuariosController@removerUsuario')->name('usuarios.remover');
    Route::get('/usuarios/confirm/{id}', 'admin\usuariosController@confirm')->name('usuarios.confirm');

     // visualizar eventos
    Route::get('/eventos', 'admin\eventosController@index')->name('admin.eventos');
    Route::get('/eventos/listar', 'admin\eventosController@listar')->name('eventos.listar');
    // visualizar cadastro
    Route::get('/eventos/viewCadastrar', 'admin\eventosController@viewCadastro')->name('eventos.cadastrar');
    // cadastrado
    Route::post('/eventos/cadastrado', 'admin\eventosController@cadastrado')->name('eventos.cadastrado');
    //Editar eventos
    Route::get('/eventos/editar/{id}', 'admin\eventosController@editarEvento')->name('eventos.editar');
    Route::post('/eventos/editar/salvar/{id}', 'admin\eventosController@editarSalvar');
    //Remover eventos
    Route::get('/eventos/remover/{id}', 'admin\eventosController@removerEvento')->name('eventos.remover');
    Route::get('/eventos/confirm/{id}', 'admin\eventosController@confirm')->name('eventos.confirm');

});