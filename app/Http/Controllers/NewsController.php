<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::latest()->get(); 
        return view('news', compact('news'));
    }

    public function create()
    {
        return view('news_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
        ]);

        News::create($validated);

        return redirect()
            ->route('news.index')
            ->with('success', 'News berhasil ditambahkan!');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $news->increment('views'); 
        return view('news_show', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|string|max:50',
        ]);

       

        return redirect()
            ->route('news.index')
            ->with('success', 'News berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'News berhasil dihapus!');
    }
}
