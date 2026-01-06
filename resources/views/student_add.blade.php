@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="card border-0 shadow-sm p-4">
        <h3>Tambah Siswa Baru</h3>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>ID Siswa</label>
                <input type="text" name="student_id" class="form-control" placeholder="Contoh: PRE:4378" required>
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kelas / Kursus</label>
                <input type="text" name="class" class="form-control" required>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection