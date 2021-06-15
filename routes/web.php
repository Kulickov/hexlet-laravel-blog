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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    $team = array(
        'id_1' => array(
            'name' => 'Алексей',
            'position' => 'Журналист'
        ),
        'id_2' => array(
            'name' => 'Евгений',
            'position' => 'Редактор'
        ),
        'id_3' => array(
            'name' => 'Максим',
            'position' => 'Биг Босс'
        ),
    );
    return view('about', ['team' => $team]);
});

Route::get('articles', function () {
    return view('articles');
});
