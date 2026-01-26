@extends('layouts.index')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-danger fw-bold"><i class="fas fa-tags"></i> Gestión de Géneros</h2>
        <a href="{{ route('genres.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nuevo Género
        </a>
    </div>

    <div class="card bg-dark border-secondary shadow">
        <div class="card-body p-0">
            <table class="table table-dark table-hover table-striped mb-0">
                <thead class="table-active">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Nombre del Género</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($genres as $genre)
                    <tr>
                        <td class="ps-4 align-middle text-secondary">#{{ $genre->id }}</td>
                        <td class="align-middle fw-bold">{{ $genre->name }}</td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                {{-- Botón Editar --}}
                                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" 
                                      onsubmit="return confirm('¿Estás seguro de que quieres borrar este género?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted">
                            No hay géneros creados todavía.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection