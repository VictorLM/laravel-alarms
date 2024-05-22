<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Laravel Alarmes' }}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
        }
    </style>

</head>

<body>

    <main class="d-flex flex-nowrap h-100">

        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
            <a href="/actuations"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">Laravel Alarmes</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/actuations"
                        class="{{ Request::is('actuations') || Request::is('actuations/*') ? 'nav-link active' : 'nav-link link-body-emphasis' }}">
                        <i class="bi bi-broadcast pe-none me-2">
                        </i>
                        Atuações
                    </a>
                </li>
                <li>
                    <a href="/alarms"
                        class="{{ Request::is('alarms') || Request::is('alarms/*') ? 'nav-link active' : 'nav-link link-body-emphasis' }}">
                        <i class="bi bi-alarm pe-none me-2">
                        </i>
                        Alarmes
                    </a>
                </li>
                <li>
                    <a href="/equipments"
                        class="{{ Request::is('equipments') || Request::is('equipments/*') ? 'nav-link active' : 'nav-link link-body-emphasis' }}">
                        <i class="bi bi-motherboard pe-none me-2">
                        </i>
                        Equipamentos
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#"
                    class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://www.shutterstock.com/image-vector/default-avatar-profile-icon-social-600nw-1677509740.jpg"
                        alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Teste</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="/">Sair</a></li>
                </ul>
            </div>
        </div>

        @yield('content')

    </main>
</body>

</html>
