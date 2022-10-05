<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header class="u-container py-6 flex items-center justify-between">
        <a href="/">
            <img src="{{ asset('images/LOGO.png') }}" alt="Logo">
        </a>
        <nav class="flex items-center gap-12 font-semibold text-main-gray-light">
            <a href="#" class="transition-colors hover:text-text-color text-text-color">Inicio</a>
            <a href="#" class="transition-colors hover:text-text-color">Ranking</a>
            <a href="#" class="transition-colors hover:text-text-color">¿Quiénes somos?</a>
            <a href="#" class="transition-colors hover:text-text-color">Contacto</a>
        </nav>
    </header>
     <main class="bg-body-bg">
    @yield('content')
     </main>
    <footer class="">
        <div class="u-container grid grid-cols-3 items-start">
            <img src="{{ asset('images/LOGO.png') }}" alt="Logo">
            <ul class="grid gap-6 text-lg justify-center">
                <li>
                    <a href="#">Fuentes</a>
                </li>
                <li>
                    <a href="#">Política anticorrupción</a>
                </li>
                <li>
                    <a href="#">Contáctanos</a>
                </li>
            </ul>
            <div class="flex gap-8 justify-end">
                <img src="{{ asset('images/icon-fb.png') }}" alt="">
                <img src="{{ asset('images/icon-tw.png') }}" alt="">
                <img src="{{ asset('images/icon-linkedin.png') }}" alt="">
                <img src="{{ asset('images/icon-insta.png') }}" alt="">
            </div>
        </div>
        <hr>
        <p class="py-8 text-lg text-center">2022@ Proyecto - Todos los derechos reservados</p>
    </footer>
</body>

</html>
