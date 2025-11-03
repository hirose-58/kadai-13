<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\MemoController; 

Route::get('/', [MemoController::class, 'show'])->name('memo.show');

Route::post('/add', [MemoController::class, 'add'])->name('memo.add');

Route::post('/bulk-delete', [MemoController::class, 'bulkDelete'])->name('memo.bulkDelete');

Route::get('edit/{edit_id}', [MemoController::class, 'getEdit'])->name('memo.getEdit');

Route::post('update', [MemoController::class, 'postEdit'])->name('memo.postEdit');