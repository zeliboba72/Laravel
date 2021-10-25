<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $articles = DB::table('articles')
            ->where('articles.name', 'like', "%$q%")
            ->join('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->select('articles.*', 'article_categories.name as category_name')
            ->get()
            ->all();
        return view('article.index', compact('articles', 'q'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
}
