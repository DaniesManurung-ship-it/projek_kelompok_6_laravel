<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function store(Request $request)
{
    // 1. Validasi
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        'category' => 'required'
    ]);

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        
        // 2. Simpan file fisik ke folder storage/app/public/gallery
        $path = $file->store('gallery', 'public');

        // 3. SIMPAN DATA KE DATABASE (PENTING!)
        \App\Models\Gallery::create([
            'title' => $file->getClientOriginalName(), // Ambil nama asli file sebagai judul
            'category' => $request->category,          // Ambil kategori dari dropdown
            'image_path' => $path                      // Simpan lokasi filenya
        ]);

        return back()->with('success', 'Foto berhasil diunggah dan disimpan!');
    }
     return back()->with('error', 'Gagal mengunggah foto.');
}
    public function index(Request $request)
    {
       $category = $request->query('category');
        $query = Gallery::query();

        if ($category && $category != 'All') {
            $query->where('category', $category);
        }

        $galleryItems = $query->latest()->get();

        return view('gallery', compact('galleryItems'));
}
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'category' => 'required'
    ]);

    $gallery = Gallery::findOrFail($id);
    $gallery->update([
        'title' => $request->title,
        'category' => $request->category,
    ]);

    return back()->with('success', 'Data foto berhasil diperbarui!');
}

public function destroy($id)
{
    $gallery = Gallery::findOrFail($id);
    
    // Hapus file fisik dari folder storage
    if ($gallery->image_path) {
        Storage::disk('public')->delete($gallery->image_path);
    }

    // Hapus data dari database
    $gallery->delete();

    return back()->with('success', 'Foto berhasil dihapus!');
}
}