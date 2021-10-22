<?php

namespace App\Http\Controllers;

use Google\Model;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $data = Article::all();

        return view('articles', ['data' => $data->all()]);
    }
}
