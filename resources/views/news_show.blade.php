@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container mt-4">

    <a href="{{ route('news.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card shadow-sm">
        <div class="card-body">

            <span class="badge bg-primary mb-2">
                {{ $news->category }}
            </span>

            <h1 class="fw-bold mb-3">
                {{ $news->title }}
            </h1>

            <p class="text-muted mb-3">
                <i class="far fa-clock"></i>
                {{ $news->created_at->format('d M Y') }}

                &nbsp; | &nbsp;

                <i class="far fa-eye"></i>
                {{ $news->views ?? 0 }} views
            </p>

            <hr>

            <p style="white-space: pre-line;">
                {{ $news->description }}
            </p>

        </div>
    </div>

</div>
@endsection
