@extends('layouts.index')

@section('content')
<div class="container mt-5">
    {{-- Botón Volver --}}
    <a href="{{ route('cinema') }}" class="btn btn-outline-secondary mb-4">
        <i class="fas fa-arrow-left"></i> Volver a la Cartelera
    </a>

    <div class="card bg-dark border-secondary shadow-lg overflow-hidden">
        <div class="row g-0">
            {{-- Columna Izquierda: Póster --}}
            <div class="col-md-4 border-end border-secondary">
                <img src="{{ $movie->getFirstMediaUrl('posters') }}" 
                     class="img-fluid w-100 h-100 object-fit-cover" 
                     alt="{{ $movie->title }}"
                     style="min-height: 500px;">
            </div>

            {{-- Columna Derecha: Información --}}
            <div class="col-md-8">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h1 class="text-danger fw-bold mb-0">{{ $movie->title }}</h1>
                            <span class="badge bg-secondary mt-2">{{ $movie->genre->name }}</span>
                        </div>
                        <div class="text-end">
                            <span class="display-6 fw-bold text-success">{{ $movie->price }}€</span>
                            <p class="text-muted small">Precio por entrada</p>
                        </div>
                    </div>

                    <hr class="border-secondary">

                    <div class="row mb-4">
                        <div class="col-6 col-md-3">
                            <p class="text-white-50 mb-0 small text-uppercase">Duración</p>
                            <p class="fw-bold"><i class="far fa-clock text-danger me-1"></i> {{ $movie->duration }} min</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <p class="text-white-50 mb-0 small text-uppercase">Calificación</p>
                            <p class="fw-bold"><i class="fas fa-user-shield text-danger me-1"></i> +{{ $movie->age }} años</p>
                        </div>
                    </div>

                    <h5 class="text-white-50 text-uppercase small">Sinopsis</h5>
                    <p class="fs-5 lh-base" style="text-align: justify;">
                        {{ $movie->synopsis }}
                    </p>

                    <div class="mt-5 p-4 rounded bg-black border border-secondary">
                        <h6 class="text-danger fw-bold mb-3"><i class="fas fa-info-circle"></i> Información de compra</h6>
                        <p class="mb-0 small text-white-50">
                            Las entradas para <strong>{{ $movie->title }}</strong> están disponibles en taquilla. 
                            Recuerda respetar la clasificación por edad (+{{ $movie->age }}).
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="https://t.me/+1ZPj8JkKrL04OWQ0" target="_blank" class="btn-telegram">
    <i class="fab fa-telegram-plane"></i>
    <span>Únete a nuestro Canal</span>
</a>
@endsection