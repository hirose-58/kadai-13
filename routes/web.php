<?php use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\MemoController; 
Route::get('/memo', [MemoController::class, 'show'])->name('memo.show'); 
Route::post('/memo/add', [MemoController::class, 'add'])->name('memo.add'); 
Route::post('/delete', 'App\\Http\\Controllers\\MemoController@delete');
Route::get('edit/{edit_id}', 'App\\Http\\Controllers\\MemoController@getEdit');
Route::post('update', 'App\\Http\\Controllers\\MemoController@postEdit');
Route::get('/', function () { return redirect('/memo'); });
