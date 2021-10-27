<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ArticleCategoryController;

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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('about', [PageController::class, 'about'])->name('about');

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::patch('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('rating', [RatingController::class, 'index'])->name('rating');

Route::get('article-categories', [ArticleCategoryController::class, 'index'])->name('article-categories.index');
Route::get('article-categories/create', [ArticleCategoryController::class, 'create'])->name('article-categories.create');
Route::post('article-categories', [ArticleCategoryController::class, 'store'])->name('article-categories.store');
Route::get('article-categories/{id}/edit', [ArticleCategoryController::class, 'edit'])->name('article-categories.edit');
Route::patch('article-categories/{id}', [ArticleCategoryController::class, 'update'])->name('article-categories.update');
Route::get('article-categories/{id}', [ArticleCategoryController::class, 'show'])->name('article-categories.show');
