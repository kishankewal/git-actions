<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('user-entries.index'));
Route::get('/test-lifecycle', [TestController::class, 'index'])->middleware('test.lifecycle');

Route::resource('user-entries', UserEntryController::class)->except(['show']);
