<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // 1. Menampilkan Semua Daftar Guru
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher_list', compact('teachers'));
    }

    // 2. Menyimpan Data Guru Baru dari Form Biodata
    public function store(Request $request)
    {
        // Validasi Data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:teachers',
            'phone' => 'required',
        ]);

        // Simpan ke Database
        Teacher::create($request->except('_token'));

        return redirect()->back()->with('success', 'Data Guru berhasil disimpan!');
    }

    // 3. Menampilkan Detail Satu Guru
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher_show', compact('teacher'));
    }

    // 4. Menampilkan Form Edit
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher_edit', compact('teacher'));
    }

    // 5. Memproses Update Data
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        
        // Update data
        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    // 6. Menghapus Data Guru
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Data guru berhasil dihapus!');
    }
}