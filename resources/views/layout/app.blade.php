<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>


    <!-- Menu movil -->
    <section id="menu"
        class="oculto fixed inset-0 bg-text-color text-white text-sm z-10 flex flex-col items-center justify-center gap-8 text-center transition-opacity">
        <a href="#" class="font-semibold">Inicio</a>
        <a href="#">Ranking</a>
        <a href="#">¿Quiénes somos?</a>
        <a href="#">Contacto</a>
        <button class="absolute top-8 right-4" type="button" id="btn-cerrar-menu">
            <img src="{{ asset('images/icon-cerrar.png') }}" class="w-8">
        </button>
    </section>
    <header class="u-container py-6 flex items-center justify-between">
        <a href="/">
            <img src="{{ asset('images/LOGO.png') }}" alt="Logo">
        </a>
        <nav class="hidden xl:flex items-center gap-12 font-semibold text-main-gray-light">
            <a href="#" class="transition-colors hover:text-text-color text-text-color">Inicio</a>
            <a href="#" class="transition-colors hover:text-text-color">Ranking</a>
            <a href="#" class="transition-colors hover:text-text-color">¿Quiénes somos?</a>
            <a href="#" class="transition-colors hover:text-text-color">Contacto</a>
        </nav>
        <button type="button" class="xl:hidden" id="btn-abrir-menu">
            <img src="{{ asset('images/icon-menu.png') }}" alt="Menu">
        </button>
    </header>








    <main class="bg-body-bg">
        @yield('content')
    </main>


    <footer class="">
        <div class="u-container grid xl:grid-cols-3 xl:items-start gap-12 xl:gap-6">
            <img src="{{ asset('images/LOGO.png') }}" alt="Logo">
            <ul class="grid gap-6 xl:text-lg xl:justify-center">
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
            <div class="flex gap-8 xl:justify-end">
                <img src="{{ asset('images/icon-fb.png') }}" alt="">
                <img src="{{ asset('images/icon-tw.png') }}" alt="">
                <img src="{{ asset('images/icon-linkedin.png') }}" alt="">
                <img src="{{ asset('images/icon-insta.png') }}" alt="">
            </div>
        </div>
        <hr>
        <p class="py-8 text-sm xl:text-lg text-center">2022@ Proyecto - Todos los derechos reservados</p>
    </footer>




    <script>
        (function() {
            const btn_abrir_menu = document.getElementById('btn-abrir-menu')
            const btn_cerrar_menu = document.getElementById('btn-cerrar-menu')
            const menu = document.getElementById('menu')

            btn_abrir_menu.addEventListener('click', () => menu.classList.remove('oculto'))
            btn_cerrar_menu.addEventListener('click', () => menu.classList.add('oculto'))
        })();
    </script>
</body>

</html>
