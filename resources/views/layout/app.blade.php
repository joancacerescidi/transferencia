<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Qullqita Qatipay</title>


    <!-- SPLIDE JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.4.2/dist/js/splide-extension-auto-scroll.min.js">
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>



    <!-- Menu movil -->
    {{-- <section id="menu"
        class="oculto fixed inset-0 bg-text-color text-white text-sm z-10 flex flex-col items-center justify-center gap-8 text-center transition-opacity">
        <a href="#" class="font-semibold">Inicio</a>
        <a href="#">Ranking</a>
        <a href="#">¿Quiénes somos?</a>
        <a href="#">Contacto</a>
        <button class="absolute top-8 right-4" type="button" id="btn-cerrar-menu">
            <img src="{{ asset('images/icon-cerrar.png') }}" class="w-8">
        </button>
    </section> --}}



    <header class="u-container py-6 flex items-center justify-between">
        <a href="/" class="font-semibold text-lg ">
            Qullqita Qatipay
        </a>
        <p class="font-semibold text-lg hidden xl:block">Data actualizada a Noviembre 2022 </p>
        <nav class="hidden xl:flex items-center gap-12 font-semibold text-main-gray-light">
            <a href="{{ route('feedback.index') }}" class="transition-colors hover:text-text-color">Feedback</a>
            <a href="{{ route('denuncia.index') }}" class="transition-colors hover:text-text-color">Denuncia</a>
            <a href="{{ route('glosario.index') }}"
                class="transition-colors hover:text-text-color cursor-pointer">Glosario</a>
        </nav>
        <button type="button" class="xl:hidden" id="btn-abrir-menu">
            <img src="{{ asset('images/icon-menu.png') }}" alt="Menu">
        </button>
    </header>

    @yield('content')



    <footer class="">
        <div class="u-container grid xl:grid-cols-3 xl:items-start gap-12 xl:gap-6">
           <a href="/" class="font-semibold text-lg ">
            Qullqita Qatipay
        </a>
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
        <p class="py-8 text-sm xl:text-lg text-center">2022@  Qullqita Qatipay - Todos los derechos reservados</p>
    </footer>

    <script src="{{ asset('js/header/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')

</body>

</html>
