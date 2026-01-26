@extends('layouts.index')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-danger fw-bold"><i class="fas fa-film"></i> Gestión de Películas</h2>
        <a href="{{ route('movies.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nueva Película
        </a>
    </div>

    <div class="card bg-dark border-secondary shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="ps-3">Póster</th>
                            <th>Título / Género</th>
                            <th>Sinopsis</th>
                            <th>Info</th>
                            <th>Precio</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movies as $movie)
                        <tr>
                            {{-- PÓSTER --}}
                            <td class="ps-3">
                                <img src="{{ $movie->getFirstMediaUrl('posters') }}" 
                                     class="rounded border border-secondary" 
                                     width="60" height="90" 
                                     style="object-fit: cover;" 
                                     alt="Sin imagen">
                            </td>

                            {{-- TÍTULO Y GÉNERO --}}
                            <td>
                                <div class="fw-bold text-white">{{ $movie->title }}</div>
                                <span class="badge bg-secondary text-light mt-1">
                                    {{ $movie->genre->name ?? 'Sin género' }}
                                </span>
                            </td>

                            {{-- SINOPSIS (Truncada para que no ocupe mucho) --}}
                            <td style="max-width: 250px;">
                                <div class="text-white-50 small text-truncate" title="{{ $movie->synopsis }}">
                                    {{ $movie->synopsis }}
                                </div>
                            </td>

                            {{-- INFO TÉCNICA --}}
                            <td>
                                <small class="d-block text-white-50"><i class="far fa-clock"></i> {{ $movie->duration }} min</small>
                                <small class="d-block text-danger fw-bold">+{{ $movie->age }} años</small>
                            </td>

                            {{-- PRECIO --}}
                            <td class="fw-bold text-success">{{ $movie->price }}€</td>

                            {{-- ACCIONES --}}
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" 
                                          onsubmit="return confirm('¿Borrar película?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                No hay películas en la cartelera.
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