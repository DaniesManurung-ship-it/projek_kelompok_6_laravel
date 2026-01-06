@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="card border-0 shadow-sm p-4">
        <h3>Edit Data Siswa</h3>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>ID Siswa</label>
                <input type="text" name="student_id" value="{{ $student->student_id }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kelas / Kursus</label>
                <input type="text" name="class" value="{{ $student->class }}" class="form-control" required>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-info text-white">Update Data</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection