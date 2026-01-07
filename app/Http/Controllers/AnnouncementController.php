<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Menampilkan semua pengumuman
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('pengumuman', compact('announcements'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('announcements.create');
    }

    // Menyimpan pengumuman baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string|max:50',
            'publish_date' => 'required|date',
            'important' => 'boolean'
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'publish_date' => $request->publish_date,
            'important' => $request->has('important'),
            'views' => 0
        ]);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    // Menampilkan detail pengumuman
    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        
        // Tambah views
        $announcement->increment('views');
        
        return view('announcements.show', compact('announcement'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcements.edit', compact('announcement'));
    }

    // Update pengumuman
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string|max:50',
            'publish_date' => 'required|date',
            'important' => 'boolean'
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->update([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'publish_date' => $request->publish_date,
            'important' => $request->has('important')
        ]);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    // Hapus pengumuman
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}