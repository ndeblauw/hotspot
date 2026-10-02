<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Keyword;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_admin) {
            $articles = Article::all();
        } else {
            $articles = Article::where('author_id', auth()->user()->id)->get();
        }

        return view('admin.articles.index', compact('articles'));
    }

    //
    public function create()
    {
        $keyword_options = Keyword::orderBy('name')->pluck('name', 'id')->toArray();

        return view('admin.articles.create', compact('keyword_options'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'author_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        // Create a new article
        $article = Article::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'author_id' => auth()->user()->id,
        ]);

        $article->keywords()->sync($request['keywords']);

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        if(! $article->canChange(auth()->user())) {
            abort(401);
        }

        $keyword_options = Keyword::orderBy('name')->pluck('name', 'id')->toArray();

        return view('admin.articles.edit', compact('article', 'keyword_options'));
    }

    public function update(Request $request, Article $article)
    {
        if(! $article->canChange(auth()->user())) {
            abort(401);
        }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'author_id' => ['required', 'integer', 'exists:users,id'],
            'keywords' => ['nullable', 'array'],
        ]);

        $article->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'author_id' => $request['author_id'],
        ]);

        $article->keywords()->sync($request['keywords']);

        return redirect()->route('admin.articles.index');
    }

    public function destroy(Article $article)
    {
        if(! $article->canChange(auth()->user())) {
            abort(401);
        }

        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}
