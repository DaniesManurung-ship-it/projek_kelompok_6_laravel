<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest()->get();
        $categories = Berita::distinct()->pluck('category');
        
        return view('berita.index', compact('berita', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'penulis' => 'required|string|max:100',
            'views' => 'integer',
            'publish_date' => 'required|date',
            'featured' => 'boolean'
        ]);

        Berita::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'penulis' => $request->penulis,
            'views' => $request->views ?? 0,
            'publish_date' => $request->publish_date,
            'featured' => $request->has('featured')
        ]);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Increment view counter
        $berita->increment('views');
        
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'penulis' => 'required|string|max:100',
            'views' => 'integer',
            'publish_date' => 'required|date',
            'featured' => 'boolean'
        ]);

        $berita = Berita::findOrFail($id);
        $berita->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'penulis' => $request->penulis,
            'views' => $request->views ?? $berita->views,
            'publish_date' => $request->publish_date,
            'featured' => $request->has('featured')
        ]);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}