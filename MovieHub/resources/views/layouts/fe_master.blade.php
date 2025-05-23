<!DOCTYPE html>
<html lang="pt" data-bs-theme="light">
<head>
    @php use Illuminate\Support\Str; @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-light text-dark">
    <header>
        <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark bg-dark px-3 py-2">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ route('home') }}">MovieHub</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">

                    <form action="{{ route('home') }}" method="GET" class="d-flex flex-grow-1 me-3 position-relative">
                        <input
                            type="text"
                            name="search"
                            class="form-control pe-5"
                            placeholder="Procurar filmes..."
                            value="{{ request('search') }}"
                        >
                        <button
                            class="btn position-absolute end-0 top-0 mt-1 me-1 px-2 py-1"
                            type="submit"
                            style="height: calc(100% - 0.5rem);"
                        >
                            <span class="material-icons">search</span>
                        </button>
                    </form>

                    <div class="d-flex align-items-center gap-2">
                        <form method="GET" action="{{ route('home') }}" class="d-flex align-items-center">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="order" value="{{ request('order') === 'asc' ? 'desc' : 'asc' }}">

                            <button type="submit" class="btn btn-outline-primary">
                                Ordenar {{ request('order') === 'asc' ? 'Z-A' : 'A-Z' }}
                            </button>
                        </form>
                        <div class="ms-3">
                            <button id="darkModeToggle" class="btn btn-outline-secondary d-flex align-items-center" title="Modo Escuro">
                                <span id="darkModeIcon" class="material-symbols-outlined">dark_mode</span>
                            </button>
                        </div>

                        @if (Route::has('login'))
                        <nav class="flex items-center justify-end gap-4">
                            @auth
                            <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('user.show') }}" class="d-flex align-items-center gap-2 px-3 py-1 rounded-circle hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                                <img
                                    src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('images/defaultuser.png') }}"
                                    alt="Foto de perfil"
                                    class="img-fluid rounded-circle"
                                    style="width: 32px; height: 32px; object-fit: cover;"
                                >
                                <span class="text-sm" style="color: var(--bs-body-color);">
                                    {{ Auth::user()->name }}
                                </span>
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger d-flex align-items-center gap-1">
                                    <span class="material-icons">logout</span>

                                </button>
                            </form>
                            @auth
                                @if (auth()->user()->user_type == 1)
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-auto d-flex align-items-center gap-2">
                                        <span class="material-icons">settings</span>
                                    </a>
                                @endif
                            @endauth
                        </div>

                            @else

                            <a href="{{ route('login') }}" class="d-flex align-items-center gap-2 px-3 py-1 rounded-circle hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                                <img
                                    src="https://www.transparentpng.com/download/user/gray-user-profile-icon-png-fP8Q1P.png"
                                    alt="Foto de perfil"
                                    class="img-fluid rounded-circle"
                                    style="width: 32px; height: 32px; object-fit: cover;"
                                >
                            </a>
                            @endauth
                        </nav>
                        @endif
                    </div>
                </div>
            </div>

          </nav>
    </header>
    @yield('content')
    <footer id="mainFooter" class="footer bg-dark text-light py-4 mt-auto">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">

          <p class="mb-0">&copy; 2025 MovieHub. Todos os direitos reservados.</p>

          <ul class="list-unstyled d-flex mb-0 gap-4">
            <li><a href="#" class="footer-link">Privacidade</a></li>
            <li><a href="#" class="footer-link">Termos</a></li>
            <li><a href="https://www.livroreclamacoes.pt/Inicio/" class="footer-link"> Livro de Reclamações </a></li>
            <li><a href="mailto:goncalo.ferreira.2024086@my.istec.pt" class="footer-link">Contato</a></li>
          </ul>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    <script src="{{ asset('js/clickable-row.js') }}"></script>
    <script src="{{ asset('js/dynamic-footer.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const savedTheme = localStorage.getItem("theme") || "light";
            document.documentElement.setAttribute("data-bs-theme", savedTheme);
            document.body.classList.toggle('bg-dark', savedTheme === 'dark');
            document.body.classList.toggle('text-light', savedTheme === 'dark');
            document.body.classList.toggle('bg-light', savedTheme === 'light');
            document.body.classList.toggle('text-dark', savedTheme === 'light');
        });
    </script>
</body>
</html>

