<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        // Load the relevant articles
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }
    public function show(Article $article)
    {
        $article->load('comments.user');

        return view('articles.show', compact('article'));
    }
}
