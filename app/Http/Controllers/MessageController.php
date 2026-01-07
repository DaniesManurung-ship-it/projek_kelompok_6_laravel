<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // 1. TAMPILKAN DATA (READ)
    public function index(Request $request)
    {
        $messages = Message::latest()->get();
        
        // Ambil pesan yang diklik, jika tidak ada ambil yang pertama
        $selectedMessage = $request->id 
            ? Message::find($request->id) 
            : $messages->first();

        // Data statistik untuk box di atas
        $stats = [
            'total'     => Message::count(),
            'unread'    => Message::where('is_read', false)->count(),
            'new_today' => Message::whereDate('created_at', today())->count(),
            'sent'      => Message::where('is_read', true)->count(), 
        ];

        return view('messages', compact('messages', 'selectedMessage', 'stats'));
    }

    // 2. SIMPAN PESAN BARU (CREATE) - INI YANG TADI HILANG
    public function store(Request $request)
    {
        // Validasi sederhana
        $request->validate([
            'sender_name' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);

        // Simpan ke database
        Message::create([
            'sender_name'     => $request->sender_name,
            'sender_role'     => $request->sender_role ?? 'Guest',
            'sender_initials' => strtoupper(substr($request->sender_name, 0, 2)),
            'subject'         => $request->subject,
            'body'            => $request->body,
            'is_read'         => false,
        ]);

        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dikirim!');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'subject' => 'required',
        'body' => 'required',
    ]);

    $message = Message::findOrFail($id);
    $message->update([
        'subject' => $request->subject,
        'body' => $request->body,
        'sender_name' => $request->sender_name,
        'sender_role' => $request->sender_role,
    ]);

    return redirect()->route('messages.index', ['id' => $id])->with('success', 'Pesan berhasil diupdate!');
}

    // 3. HAPUS PESAN (DELETE)
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Pesan dihapus');
    }
}