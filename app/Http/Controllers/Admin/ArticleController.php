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
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'author_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        // Create a new article
        Article::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'author_id' => auth()->user()->id,
            'keyword' => 'dummy',
        ]);

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        // $article contains the referenced article

        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'author_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        $article->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'author_id' => $request['author_id'],
            'keyword' => 'dummy updated',
        ]);

        return redirect()->route('admin.articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}
