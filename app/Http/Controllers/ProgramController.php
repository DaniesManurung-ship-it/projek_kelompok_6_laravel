<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    // Menampilkan semua program
    public function index()
    {
        $programs = Program::orderBy('created_at', 'desc')->get();
        return view('program', compact('programs'));
    }

    // Simpan program baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'duration' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'seats' => 'required|string|max:50',
            'category' => 'required|string|max:50',
        ]);

        Program::create($request->all());
        return redirect()->back()->with('success', 'Program berhasil ditambahkan!');
    }

    // Detail program
    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('program_detail', compact('program'));
    }

    // Update program
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'duration' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'seats' => 'required|string|max:50',
            'category' => 'required|string|max:50',
        ]);

        $program->update($request->all());
        return redirect()->route('program.index')->with('success', 'Program berhasil ditambahkan!');
    }

    // Hapus program
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->back()->with('success', 'Program berhasil dihapus!');
    }
    
}
