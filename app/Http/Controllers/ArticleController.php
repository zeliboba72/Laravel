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
            ->leftJoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
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

    public function create()
    {
        $categories = DB::table('article_categories')
            ->select('id', 'name')
            ->get()
            ->all();
        $article = new Article();
        return view('article.create', compact('article', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',
            'category_id' => 'required',
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $categories = DB::table('article_categories')
            ->select('id', 'name')
            ->get()
            ->all();

        $article = Article::findOrFail($id);
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|unique:articles,name,' . $article->id,
            'body' => 'required|min:10',
            'category_id' => 'required',
        ]);

        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index');
    }
}
