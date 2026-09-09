<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('admin.articles.index', compact('articles'));
    }

    //
    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        // Validate the request (form data)

        // Create a new article
        Article::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'author_id' => $request['author_id'],
            'keyword' => 'dummy',
        ]);

        return redirect()->route('admin.articles.index');
    }
}
