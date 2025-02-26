<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

//rotte articoli 

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}',[ArticleController::class, 'byCategory'])->name('byCategory');

Route::get('/edit/{article}',[ArticleController::class, 'edit'])->name('article.edit');
//rotte rivisore

Route::patch('/accept/{article}',[RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}',[RevisorController::class, 'reject'])->name('reject');
Route::get('/revisor/index',[RevisorController::class, 'index'])->name('revisor.index');
Route::get('/revisor/index',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::post('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class,'makeRevisor'])->middleware('auth')->name('make.revisor');
Route::get('/revisor/question', [RevisorController::class,'questionRevisor'])->middleware(['auth', 'RevisorForm'])->name('question.revisor');
Route::post('/revisor/article/{article}', [RevisorController::class, 'sendToReview'])->middleware('auth')->name('revisor.article.review');


//rotte barra di ricerca

Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

// rotte per la lingua
Route::get('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');










