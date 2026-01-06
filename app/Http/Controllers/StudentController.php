<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        // Diubah dari 'admin.students.index' menjadi 'student_list'
        return view('student_list', compact('students'));
    }

    public function create() {
        // Diubah dari 'admin.students.create' menjadi 'student_add'
        // (Pastikan Anda punya file bernama student_add.blade.php)
        return view('student_add');
    }

    public function store(Request $request) {
        // Validasi sederhana agar data tidak kosong
        $request->validate([
            'student_id' => 'required',
            'name' => 'required',
            'class' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id) {
        $student = Student::findOrFail($id);
        // Diubah dari 'admin.students.edit' menjadi 'student_edit'
        // (Pastikan Anda punya file bernama student_edit.blade.php)
        return view('student_edit', compact('student'));
    }

    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('students.index')->with('info', 'Data berhasil diupdate');
    }

    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('danger', 'Data berhasil dihapus');
    }
}