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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('clientes', 'ClienteController');

Route::resource('fornecedores', 'FornecedorController');
Route::get('fornecedor/{fornecedor}/edit', 'FornecedorController@edit')->name('fornecedores.edit');
Route::put('fornecedor/{fornecedor}', 'FornecedorController@update')->name('fornecedores.update');
Route::delete('fornecedor/{fornecedor}', 'FornecedorController@destroy')->name('fornecedores.destroy');

Route::resource('receitas', 'ReceitaController');

Route::resource('custos', 'CustoController');
