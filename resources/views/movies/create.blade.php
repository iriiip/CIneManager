@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8"> <div class="card bg-dark border-secondary shadow-lg">
                <div class="card-header border-secondary bg-black text-white">
                    <h4 class="mb-0"><i class="fas fa-video text-danger"></i> Alta de Película</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Fila 1: Título y Género --}}
                        <div class="row mb-3">
                            <div class="col-md-7">
                                <label class="form-label text-white-50">Título</label>
                                <input type="text" name="title" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label text-white-50">Género</label>
                                <select name="genre_id" class="form-select bg-dark text-white border-secondary">
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Fila 2: Sinopsis --}}
                        <div class="mb-3">
                            <label class="form-label text-white-50">Sinopsis</label>
                            <textarea name="synopsis" rows="3" class="form-control bg-dark text-white border-secondary" required></textarea>
                        </div>

                        {{-- Fila 3: Datos numéricos agrupados --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label text-white-50">Duración (min)</label>
                                <input type="number" name="duration" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-white-50">Edad Mínima</label>
                                <input type="number" name="age" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-white-50">Precio (€)</label>
                                <input type="number" step="0.01" name="price" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                        </div>

                        {{-- Fila 4: Póster --}}
                        <div class="mb-4">
                            <label class="form-label text-white-50">Póster / Carátula</label>
                            <input type="file" name="image" class="form-control bg-dark text-white border-secondary">
                        </div>

                        {{-- Botones --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Guardar Película</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection