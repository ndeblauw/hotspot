<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = User::query()
            ->has('articles')
            ->withCount('articles')
            ->orderBy('name')
            ->get();

        return view('authors.index', compact('authors'));
    }

    public function show(User $user): View
    {
        $author = $user->loadCount('articles');

        $articles = $user->articles()
            ->with('keywords')
            ->latest()
            ->get();

        return view('authors.show', compact('author', 'articles'));
    }
}
