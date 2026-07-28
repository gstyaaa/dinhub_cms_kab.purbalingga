<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PpidController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('profil')
    ->name('profile.')
    ->controller(ProfileController::class)
    ->group(function () {

        Route::get('/', 'index')
            ->name('index');

        Route::get('/tentang', 'about')
            ->name('about');

        Route::get('/visi-misi', 'visionMission')
            ->name('vision-mission');

        Route::get('/tugas-pokok-fungsi', 'duties')
            ->name('duties');

        Route::get('/struktur-organisasi', 'organization')
            ->name('organization');

    });


Route::get('/berita', [PostController::class, 'index'])->name('posts.index');
Route::get('/berita/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

Route::prefix('ppid')
    ->name('ppid.')
    ->controller(PpidController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/program', 'program')->name('program');
        Route::get('/sakip', 'sakip')->name('sakip');
        Route::get('/peraturan', 'peraturan')->name('peraturan');
    });

Route::get('/tanya-dishub', [QuestionController::class, 'create'])->name('question.create');
Route::post('/tanya-dishub', [QuestionController::class, 'store'])->name('question.store');

