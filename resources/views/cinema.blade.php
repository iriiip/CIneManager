@extends('layouts.index')

@section('content')
<div class="mb-4">
    @foreach($promotions as $promo)
    @if($promo->is_active)
    <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert"
        style="background-color: #ffc107; color: #000;">
        <div class="d-flex align-items-center">
            <i class="fas fa-bullhorn me-3 fs-4"></i>
            <div>
                <strong>{{ $promo->title }}</strong>
                <span class="ms-2 badge bg-dark text-warning">
                    {{ $promo->start_date }} hasta {{ $promo->end_date }}
                </span>
                <br>
                <span>{{ $promo->message }}</span>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h2 class="text-danger fw-bold border-start border-4 border-danger ps-3">
            Cartelera <span class="text-white">Actual</span>
        </h2>
    </div>
    <div class="col-md-6">
        <form action="{{ route('cinema') }}" method="GET" class="d-flex gap-2">
            <div class="input-group">
                <span class="input-group-text bg-dark border-secondary text-secondary">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" name="search" class="form-control bg-dark text-white border-secondary"
                    placeholder="Buscar por título o género..."
                    value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-danger">Buscar</button>

            @if(request('search'))
            <a href="{{ route('cinema') }}" class="btn btn-outline-secondary" title="Borrar filtros">
                <i class="fas fa-times"></i>
            </a>
            @endif
        </form>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
    @foreach($movies as $movie)
    <div class="col">
        <div class="card h-100 shadow-lg border-0" style="background-color: #1e1e1e; overflow: hidden;">

            <div style="height: 380px; position: relative;">
                <img src="{{ $movie->getFirstMediaUrl('posters') }}"
                    class="card-img-top h-100 w-100 object-fit-cover"
                    alt="Póster de {{ $movie->title }}">

                <div class="position-absolute top-0 end-0 m-2">
                    <span class="badge bg-danger rounded-pill shadow">
                        +{{ $movie->age }}
                    </span>
                </div>
            </div>

            <div class="card-body text-white d-flex flex-column">
                <h5 class="card-title fw-bold text-truncate" title="{{ $movie->title }}">
                    {{ $movie->title }}
                </h5>

                <div class="d-flex justify-content-between small text-secondary mb-2">
                    <span><i class="fas fa-film me-1"></i> {{ $movie->genre->name }}</span>
                    <span><i class="far fa-clock me-1"></i> {{ $movie->duration }} min</span>
                </div>

                <p class="card-text text-white-50 small flex-grow-1"
                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                    {{ $movie->synopsis }}
                </p>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-bold text-danger">{{ $movie->price }}€</span>
                    <a href="{{ route('show', $movie->id) }}" class="btn btn-sm btn-outline-light rounded-pill px-3">
                        Ver ficha
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if(count($movies) == 0)
<div class="text-center py-5 text-secondary">
    <i class="fas fa-film fa-3x mb-3"></i>
    <p class="fs-4">No se encontraron películas.</p>
</div>
@endif

@if (session('info'))
<div class="alert alert-info position-fixed bottom-0 end-0 m-3 shadow-lg" role="alert" style="z-index: 1050;">
    {{ session('info') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<a href="https://t.me/+1ZPj8JkKrL04OWQ0" target="_blank" class="btn-telegram">
    <i class="fab fa-telegram-plane"></i>
    <span>Únete a nuestro Canal</span>
</a>

@endsection