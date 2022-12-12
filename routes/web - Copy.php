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

Route::get('hello', function() {
    echo "<h1>hello world</h1>";
});
Route::get('truyenbien/{bien1}/{bien2}', function ($bien1, $bien2) {
    echo "<h1>$bien1 $bien2</h1>";
});
Route::get('goiview1', function () {
    return view('php58.view1');
});
Route::get('goiview2', function () {
    return view('php58.view2', ['hoten'=>'nguyen van a', 'email'=>'vmt@gmail.com']);
});
Route::get('goiview3', function () {
    return view('php58.view3');
});
Route::get('goiform1', function () {
    return view('php58.form1');
});
Route::post('goiform1', function () {
    $txt = Request::get('txt');
    return view('php58.form1',['txt'=>$txt]);
});
Route::get('cong2so', function () {
    return view('php58.form2');
});
Route::post('cong2so', function () {
    return view('php58.form2');
});
//..........

Route::get('trangchu', function () {
    return view('php58.trangchu');
});
Route::get('gioithieu', function () {
    return view('php58.gioithieu');
});
Route::get('php58/hello', function () {
    echo "<h1>trieu goi middleware hello</h1>";
})->middleware('goi_hello');

use App\Http\Controllers\HelloController;

Route::get('goicontroller', [HelloController::class, "index"]);
Route::get('goicontroller2/{bien1}/{bien2}', [HelloController::class, 'hello']);
