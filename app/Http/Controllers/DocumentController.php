<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // READ: Menampilkan data di dashboard
    public function index()
{
    $documents = Document::latest()->get();
    
    // Tambahkan variabel ini agar statistik di atas tidak error
    $totalSize = Document::sum('size') ?: 0;
    $countAcademic = Document::where('category', 'Academic')->count();
    $countAdmin = Document::where('category', 'Administrative')->count();
    $countFinance = Document::where('category', 'Financial')->count();

    return view('documents', compact('documents', 'totalSize', 'countAcademic', 'countAdmin', 'countFinance'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required'
    ]);

    $document = Document::findOrFail($id);
    
    // Kita update nama dan kategorinya saja
    $document->update([
        'name' => $request->name,
        'category' => $request->category,
    ]);

    return back()->with('success', 'Dokumen berhasil diperbarui!');
}

    // CREATE: Proses upload file
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx,xlsx,png,jpg|max:2048',
            'category' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('documents', 'public');

            Document::create([
                'name' => $file->getClientOriginalName(),
                'type' => $file->getClientOriginalExtension(),
                'size' => round($file->getSize() / 1024 / 1024, 2) . ' MB',
                'category' => $request->category,
                'file_path' => $path,
            ]);
        }

        return back()->with('success', 'File berhasil diupload!');
    }

    // DELETE: Menghapus file
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return back()->with('success', 'File berhasil dihapus!');
    }
}
