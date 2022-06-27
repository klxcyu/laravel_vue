<?php

use App\Http\Controllers\ViewsController;
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
Route::get('/test', function() {
    $a = 0;
    while(true) {
        if($a === 100000000) {
            break;
        }
        $a++;
    };
    return response()->json('테스트다');
});
Route::get('/{any}', [ViewsController::class, 'index'])->where('any', '.*');

Route::post('/test', function() {


    $a = 0;
    while(true) {
        if($a === 10000000) {
            break;
        }
        $a++;
    };

    request()->validate([
        'name' => ['required']
    ],
    [
        'required' => '필수사항 누락'
    ]);


    return response()->json(request('name'));
});

Route::post('create', function() {
    request()->validate([
        'title' => ['required'],
        'content' => ['required'],
    ],
    [
        'required' => '필수사항 누락'
    ]);

    return response()->json('success', 200);
});
