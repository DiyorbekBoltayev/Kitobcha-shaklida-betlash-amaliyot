<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return "<h1>bu index page</h1>";
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    $username = request('username');
    $password = request('password');
    if ($username === 'admin' && $password === 'admin') {
        session(['username' => $username, 'role' => 'admin']);
        return redirect()->route('admin-panel');
    }elseif ($username === 'manager' && $password === 'manager') {
        session(['username' => $username, 'role' => 'manager']);
        return redirect()->route('manager-panel');
    }
    return redirect()->route('login')->withErrors('Username yoki parol xato');
});

Route::get('/logout', function () {
    session()->forget('username');
    return redirect()->route('login');
})->name('logout');

Route::get('/admin-panel', function () {
    return "<h1>bu admin panel <a href='/logout'>chiqish</a> </h1>";
})->name('admin-panel')->middleware('admin');

Route::get('/manager-panel', function () {
    return "<h1>bu manager panel <a href='/logout'>chiqish</a> </h1>";
})->name('manager-panel')->middleware('manager');
