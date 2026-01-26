@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card bg-dark border-secondary shadow-lg">
                <div class="card-header border-secondary bg-black text-white">
                    <h4 class="mb-0"><i class="fas fa-bullhorn text-danger"></i> Nueva Promoción</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('promotions.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label text-white-50">Título del Anuncio</label>
                            <input type="text" name="title" class="form-control bg-dark text-white border-secondary" 
                                   value="{{ old('title') }}" placeholder="Ej: ¡Miércoles de Cine!" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white-50">Mensaje / Contenido</label>
                            <textarea name="message" rows="3" class="form-control bg-dark text-white border-secondary" 
                                      placeholder="Escribe aquí el detalle de la oferta..." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-white-50">Fecha de Inicio</label>
                                <input type="datetime-local" name="start_date" 
                                       class="form-control bg-dark text-white border-secondary" 
                                       value="{{ old('start_date') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white-50">Fecha de Fin</label>
                                <input type="datetime-local" name="end_date" 
                                       class="form-control bg-dark text-white border-secondary" 
                                       value="{{ old('end_date') }}" required>
                                <small class="text-muted">Debe ser posterior al inicio.</small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('promotions.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-paper-plane me-1"></i> Publicar Promoción
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection