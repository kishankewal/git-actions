<?php

use App\Http\Controllers\UserEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('user-entries.index'));
Route::resource('user-entries', UserEntryController::class)->except(['show']);
