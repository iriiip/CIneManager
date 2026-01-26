@extends('layouts.index')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-danger fw-bold"><i class="fas fa-bullhorn"></i> Gestión de Promociones</h2>
        <a href="{{ route('promotions.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nueva Promoción
        </a>
    </div>

    <div class="card bg-dark border-secondary shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4">Título</th>
                            <th>Vigencia (Inicio - Fin)</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($promotions as $promo)
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-white">{{ $promo->title }}</div>
                                <small class="text-white-50 text-truncate d-inline-block" style="max-width: 200px;">
                                    {{ $promo->message }}
                                </small>
                            </td>
                            <td>
                                <div class="small">
                                    <i class="far fa-calendar-alt text-danger me-1"></i> {{ $promo->start_date }}
                                </div>
                                <div class="small text-secondary">
                                    <i class="fas fa-flag-checkered me-1"></i> {{ $promo->end_date }}
                                </div>
                            </td>
                            <td>
                                @if($promo->is_active)
                                    <span class="badge bg-success text-dark">
                                        <i class="fas fa-check-circle"></i> Activa
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times-circle"></i> Inactiva
                                    </span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('promotions.edit', $promo->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('promotions.destroy', $promo->id) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar esta promoción?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                No hay promociones creadas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection