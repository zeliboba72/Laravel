<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')
            ->select('id', 'name', 'likes_count')
            ->where('state', 'published')
            ->orderBy('likes_count', 'desc')
            ->get()
            ->all();
        return view('rating', ['articles' => $articles]);
    }
}
