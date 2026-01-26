@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-dark border-secondary shadow-lg">
                <div class="card-header border-secondary bg-black text-white">
                    <h4 class="mb-0"><i class="fas fa-edit text-warning"></i> Editar Película</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        {{-- Fila 1: Título y Género --}}
                        <div class="row mb-3">
                            <div class="col-md-7">
                                <label class="form-label text-white-50">Título</label>
                                <input type="text" name="title" value="{{ $movie->title }}" 
                                       class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label text-white-50">Género</label>
                                <select name="genre_id" class="form-select bg-dark text-white border-secondary">
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Fila 2: Sinopsis --}}
                        <div class="mb-3">
                            <label class="form-label text-white-50">Sinopsis</label>
                            <textarea name="synopsis" rows="3" class="form-control bg-dark text-white border-secondary" required>{{ $movie->synopsis }}</textarea>
                        </div>

                        {{-- Fila 3: Datos numéricos --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label text-white-50">Duración (min)</label>
                                <input type="number" name="duration" value="{{ $movie->duration }}" 
                                       class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-white-50">Edad Mínima</label>
                                <input type="number" name="age" value="{{ $movie->age }}" 
                                       class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-white-50">Precio (€)</label>
                                <input type="number" step="0.01" name="price" value="{{ $movie->price }}" 
                                       class="form-control bg-dark text-white border-secondary" required>
                            </div>
                        </div>

                        {{-- Fila 4: Póster (con previsualización) --}}
                        <div class="mb-4">
                            <label class="form-label text-white-50">Póster</label>
                            <div class="d-flex align-items-center gap-3">
                                @if($movie->hasMedia('posters'))
                                    <div class="text-center">
                                        <img src="{{ $movie->getFirstMediaUrl('posters') }}" 
                                             class="rounded border border-secondary" width="80" alt="Actual">
                                        <div class="small text-muted mt-1">Actual</div>
                                    </div>
                                @endif
                                <div class="flex-grow-1">
                                    <input type="file" name="image" class="form-control bg-dark text-white border-secondary">
                                    <small class="text-muted">Deja esto vacío si no quieres cambiar la imagen.</small>
                                </div>
                            </div>
                        </div>

                        {{-- Botones --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning">Actualizar Película</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection