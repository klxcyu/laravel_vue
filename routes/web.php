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
        'title' => ['required',/*  'email', 'min:15' */],
        'content' => ['required'],
    ],
    [
        'email' => '이메일 형식이 아님',
        'required' => ':attribute는 필수항목 입니다!',
        'min' => '글자수 누락',
    ],
    [
        'titles' => '타이틀',
        'contents' => '본문내용'
    ]);

    return response()->json('success', 200);
});
