<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CineManager - Tu Cartelera</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #000000 !important;
            border-bottom: 2px solid #b71c1c;
        }

        .footer {
            margin-top: auto;
            background-color: #000000;
            border-top: 1px solid #333;
        }

        .card {
            background-color: #1e1e1e;
            color: white;
            border: none;
        }

        .btn-cine {
            background-color: #b71c1c;
            color: white;
        }

        .btn-cine:hover {
            background-color: #d32f2f;
            color: white;
        }

        .btn-telegram {
            background: linear-gradient(45deg, #2497d4, #24A1DE);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 50px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(36, 161, 222, 0.4);
            transition: all 0.3s ease;
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
        }

        .btn-telegram:hover {
            transform: translateY(-5px);
            color: white;
            box-shadow: 0 6px 20px rgba(36, 161, 222, 0.6);
            background: linear-gradient(45deg, #24A1DE, #2497d4);
        }

        .btn-telegram i {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="fas fa-film text-danger"></i> CINE<span class="text-danger">MANAGER</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cinema') }}">Cartelera</a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Gestión
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{ route('genres.index') }}">Géneros</a></li>
                            <li><a class="dropdown-item" href="{{ route('movies.index') }}">Películas</a></li>
                            <li><a class="dropdown-item" href="{{ route('promotions.index') }}">Promociones</a></li>
                        </ul>
                    </li>
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm ms-2" href="{{ route('login') }}">Acceso Staff</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show bg-dark text-success border-success" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="container mt-4">
                @if (session('info'))
                <div class="alert alert-dismissible fade show shadow-lg border-0" role="alert"
                    style="background-color: #1a1a1a; border-left: 5px solid #dc3545 !important; color: white;">

                    <div class="d-flex align-items-center">
                        @if(Str::contains(session('info'), ['No se puede']))
                        <i class="fas fa-exclamation-circle text-danger me-3 fs-4"></i>
                        @else
                        <i class="fas fa-check-circle text-success me-3 fs-4"></i>
                        @endif

                        <div>
                            <span class="fw-bold text-uppercase small d-block" style="letter-spacing: 1px; color: #aaa;">Sistema de Gestión</span>
                            {{ session('info') }}
                        </div>
                    </div>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            @yield('content')
        </div>
    </main>

    <footer class="footer py-4 text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} CineManager. Todos los derechos reservados.</p>
            <small class="text-secondary">Proyecto final de Laravel - Desarrollo Web</small>
            <div class="mt-2">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>