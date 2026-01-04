@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <h5 class="fw-bold mb-0">Detail Profil Guru</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <!-- Menampilkan foto jika ada, jika tidak pakai gambar default -->
                    <img src="https://ui-avatars.com/api/?name={{ $teacher->first_name }}+{{ $teacher->last_name }}&size=200" 
                         class="img-fluid rounded shadow-sm" alt="Foto Guru">
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">Nama Lengkap</th>
                            <td>: {{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $teacher->email }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>: {{ $teacher->phone }}</td>
                        </tr>
                        <tr>
                            <th>Tempat, Tgl Lahir</th>
                            <td>: {{ $teacher->pob }}, {{ $teacher->dob }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $teacher->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection