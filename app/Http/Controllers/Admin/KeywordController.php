<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::all();

        return view('admin.keywords.index', compact('keywords'));
    }

    public function create()
    {
        return view('admin.keywords.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Keyword::create([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.keywords.index');
    }

    public function edit(Keyword $keyword)
    {
        return view('admin.keywords.edit', compact('keyword'));
    }

    public function update(Request $request, Keyword $keyword)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $keyword->update([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.keywords.index');
    }

    public function destroy(Keyword $keyword)
    {
        $keyword->delete();

        return redirect()->route('admin.keywords.index');
    }
}
