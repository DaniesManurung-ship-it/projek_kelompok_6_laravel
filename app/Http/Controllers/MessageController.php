<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Menampilkan semua pesan
    public function index()
    {
        $messages = Message::latest()->get();
        return view('messages', compact('messages'));
    }

    // Menyimpan pesan baru
    public function store(Request $request)
    {
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required|email|max:255',
            'sender_role' => 'required|string|max:100',
            'subject' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        Message::create($request->all());

        return redirect()->route('messages')
            ->with('success', 'Message sent successfully!');
    }

    // Menampilkan detail pesan
    public function show($id)
    {
        $message = Message::findOrFail($id);
        
        return view('message-detail', compact('message'));
    }

    // Menghapus pesan
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages')
            ->with('success', 'Message deleted successfully!');
    }

    // Menandai sebagai dibaca
    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        

        return back()->with('success', 'Message marked as read');
    }
}