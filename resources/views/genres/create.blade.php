@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark border-secondary shadow-lg">
                <div class="card-header border-secondary bg-black text-white">
                    <h4 class="mb-0"><i class="fas fa-plus-circle text-danger"></i> Crear Nuevo Género</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('genres.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label text-white-50">Nombre del Género</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control bg-dark text-white border-secondary" 
                                   placeholder="Ej: Ciencia Ficción" required autofocus>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('genres.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-save"></i> Guardar Género
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection