<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ptoyecto</title>


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
    <!-- Modal Feedback -->
    <dialog class="fixed inset-0 p-6 xl:p-10 rounded-xl w-full xl:w-1/3" id="modal-feedback">
        <h2 class="text-center xl:text-xl font-bold mb-8">¿Como podemos mejorar?</h2>
        <form class="grid gap-6 xl:gap-10" method="POST" action="created-feedback">
            @csrf
            <div>
                <label class="font-semibold text-xs xl:text-sm block mb-1" for="detalle">Danos tu opinión de que
                    podriamos mejorar.</label>
                <textarea name="detalle" id="detalle" rows="3" placeholder="Escribe aqui..."
                    class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue"></textarea>
                @error('detalle')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <h4 class="font-bold xl:text-lg">Datos de contacto</h4>
            <div>
                <label for="nombre" class="font-semibold text-xs xl:text-sm block mb-1">Nombres</label>
                <input id="nombre" name="nombre" type="text" placeholder="Nombres"
                    class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue">

                @error('nombre')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="email" class="font-semibold text-xs xl:text-sm block mb-1">Correo electrónico</label>
                <input id="email" name="email" type="email" placeholder="E-mail"
                    class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue">

                @error('email')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="telefono" class="font-semibold text-xs xl:text-sm block mb-1">Celular</label>
                <input id="telefono" name="telefono" type="number" placeholder="Celular"
                    class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue">

                @error('telefono')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit"
                class="block w-full p-5 bg-main-blue text-white font-semibold rounded-md text-sm">Enviar</button>
        </form>
        <button type="submit" id="cerrar-modal-feedback" class="absolute top-4 right-4 cursor-pointer">
            <img src="{{ asset('images/icon-cerrar-black.png') }}" alt="">
        </button>
    </dialog>


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
        <a href="/">
            <img src="{{ asset('images/LOGO.png') }}" alt="Logo">
        </a>
        <p class="font-semibold text-lg hidden xl:block">Data actualizada hasta Octubre 200 </p>
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

    <script src="{{ asset('js/header/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')

</body>

</html>
