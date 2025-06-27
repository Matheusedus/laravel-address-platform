<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Laravel Address Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Laravel Address Platform</a>
            <a class="btn btn-light ms-auto" href="{{ url('/users/create') }}">Cadastrar Usuário</a>
        </div>
    </nav>
    <div class="container mb-5">
        @yield('content')
    </div>
</body>
</html>