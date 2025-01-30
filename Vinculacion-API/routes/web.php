<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
return view('Login');
});

Route::get('/login', [AuthController::class, 'showLoginForm']) -> name('login');
Route::post('/login', [AuthController::class, 'login']) -> name('login.post');
Route::get('/logout', [AuthController::class, 'logout']) -> name('logout');

Route::get('/PanelVinculacion', function(){
    return view('./VistasVinculacion/PanelVinculacion');
}) -> middleware('auth') -> name('PanelVinculacion');