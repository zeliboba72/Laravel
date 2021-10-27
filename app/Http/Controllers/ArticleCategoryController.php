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

    public function create()
    {
        $articleCategory = new ArticleCategory();
        return view('article_category.create', compact('articleCategory'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:6|max:100',
            'description' => 'required|min:20|max:500',
        ]);

        $category = new ArticleCategory();
        $category->fill($data);
        $category->save();

        return redirect()->route('article-categories.index');
    }

    public function edit($id)
    {
        $articleCategory = ArticleCategory::findOrFail($id);
        return view('article_category.edit', compact('articleCategory'));
    }

    public function update(Request $request, $id)
    {
        $articleCategory = ArticleCategory::findOrFail($id);

        $data = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $articleCategory->fill($data);
        $articleCategory->save();
        redirect()->route("article-categories.index");
    }
}
