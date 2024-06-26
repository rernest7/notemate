<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Notes\ShowNote;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Notes\UploadNotesController;
use App\Http\Controllers\Notes\DownloadNotesController;

Route::resource('categories', CategoriesController::class)->except(['create', 'edit']);

Route::get("notes/{id}", ShowNote::class)
    ->name('notes.show');
Route::resource('notes', \App\Http\Controllers\NotesController::class)
    ->except(['show']);

Route::redirect('/', route('categories.index'));

Route::get('notes/{id}/{format}', [\App\Http\Controllers\Notes\DownloadNotesController::class, 'index'])->name('notes.download');
Route::post('notes/upload', [\App\Http\Controllers\Notes\UploadNotesController::class, 'index'])->name('notes.upload');
