<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ url('css/signin.css') }}">
</head>
<body class="text-center">
<main class="form-signin">
    <form method="post" action="{{ route('auth') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Autenticación</h1>
        @if(session()->has('respuesta'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('respuesta') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Ingresa tu usuario" required />
            <label for="floatingInput">Usuario</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Ingresa tu contraseña" required />
            <label for="floatingPassword">Contraseña</label>
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Recordarme
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    </form>
</main>
</body>
</html>
