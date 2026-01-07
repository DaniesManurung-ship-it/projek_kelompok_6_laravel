<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('publish_date', 'desc')->get();
        return view('pengumuman', compact('announcements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'content' => 'required|string',
            'publish_date' => 'required|date',
            'important' => 'nullable|boolean',
        ]);

        Announcement::create([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->content,
            'publish_date' => $request->publish_date,
            'important' => $request->important ? true : false,
        ]);

        return redirect()->back()->with('success', 'Pengumuman berhasil disimpan!');
    }
    public function show($id)
{
    $announcement = Announcement::findOrFail($id);
    $announcement->increment('views'); 
    return view('pengumuman_detail', compact('announcement'));
}

}
