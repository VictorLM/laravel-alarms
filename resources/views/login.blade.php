<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Laravel Alarms' }}</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            html,
            body {
                height: 100%;
            }

            .form-signin {
                max-width: 330px;
                padding: 1rem;
            }

            .form-signin .form-floating:focus-within {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>

    </head>

    <body class="d-flex align-items-center py-4 bg-body-tertiary">

        <main class="form-signin w-100 m-auto">
            <form>
                <h1 class="text-center mb-4">Laravel Alarmes</h1>

                <h1 class="h4 mb-3 fw-normal">Entre com suas credenciais</h1>

                <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="teste@teste.com">
                <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" value="teste123">
                <label for="floatingPassword">Senha</label>
                </div>

                <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Lembrar-me
                </label>
                </div>
                <a href="/actuations">
                    <button class="btn btn-primary w-100 py-2" type="button">Entrar</button>
                </a>
                <p class="mt-5 mb-3 text-body-secondary text-center">Copyright &copy; 2024</p>
            </form>
        </main>

    </body>
</html>
