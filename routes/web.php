<?php

use App\Http\Controllers\MemoController;
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
    return view('welcome');
});

// リソースを使用する場合//1定義で7つのルーティングが定義できる
Route::resource('memos', MemoController::class);

// リソースを使用しない場合↓が必要
// Route::get('/memos', [MemoController::class, 'index']);//indexメソッドを呼び出す
// Route::get('/memos/create', [MemoController::class, 'create']);//createメソッドは
// Route::post('/memos', [MemoController::class, 'store']);//postメソッドはデータを追加する

// Route::get('/memos/{memo}', [MemoController::class, 'show']);
// Route::get('/memos/{memo}/edit', [MemoController::class, 'edit']);
// Route::patch('/memos/{memo}', [MemoController::class, 'update']);
// Route::delete('/memos/{memo}', [MemoController::class, 'destroy']);

