<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\DB;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $articleCategories = ArticleCategory::all();

        return view('article_category.index', compact('articleCategories'));
    }

    public function show($id)
    {
        $articleCategory = ArticleCategory::findOrFail($id);
        $articles = DB::table('articles')
            ->where('category_id', '=', $id)
            ->get()
            ->all();
        return view('article_category.show', compact('articleCategory', 'articles'));
    }
}
