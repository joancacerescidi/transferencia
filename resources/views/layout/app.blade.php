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
    <style>
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
            overflow: hidden;
            background: #fff;
        }

        #preloader:before {
            content: "";
            position: fixed;
            top: calc(50% - 30px);
            left: calc(50% - 30px);
            border: 6px solid #D8A709;
            border-top-color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            -webkit-animation: animate-preloader 1s linear infinite;
            animation: animate-preloader 1s linear infinite;
        }

        @-webkit-keyframes animate-preloader {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes animate-preloader {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
     <script>
        window.addEventListener('load', function() {
            console.log('La página ha terminado de cargarse!!');
        });
    </script>
</head>

<body>



    <!-- Menu movil -->
    <section id="menu"
        class="oculto fixed inset-0 bg-text-color text-white text-sm z-10 flex flex-col items-center justify-center gap-8 text-center transition-opacity">
        <a href="/" class="font-semibold">Inicio</a>
        <a href="{{ route('feedback.index') }}">Danos tu opinión</a>
        <a href="{{ route('denuncia.index') }}">Comparte información</a>
        <a href="{{ route('glosario.index') }}">Glosario</a>
        <button class="absolute top-8 right-4" type="button" id="btn-cerrar-menu">
            <img src="{{ asset('images/icon-cerrar.png') }}" class="w-8">
        </button>
    </section>

    <div class="bg-gray-800 text-white">

        <header class="u-container py-6 flex items-center justify-between">
            <a href="/" class="font-semibold text-lg ">
                Qullqita Qatipay
            </a>
            <p class="font-semibold text-lg hidden xl:block">Data actualizada a Noviembre 2022 </p>
            <nav class="hidden xl:flex items-center gap-12 font-semibold text-main-gray-light">
                <a href="{{ route('feedback.index') }}" class="text-white">Danos tu opinión</a>
                <a href="{{ route('denuncia.index') }}" class="text-white">Comparte información</a>
                <a href="{{ route('glosario.index') }}" class=" text-white cursor-pointer">Glosario</a>
            </nav>
            <button type="button" class="xl:hidden" id="btn-abrir-menu">
                <img src="{{ asset('images/ icon-menu.png') }}" alt="Menu">
            </button>
        </header>
    </div>
    @yield('content')



    <footer class="bg-gray-900 text-white">
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
                <img src="{{ asset('images/icon-fb.svg') }}" alt="">
                <img src="{{ asset('images/icon-tw.svg') }}" alt="">
                <img src="{{ asset('images/icon-linkedin.svg') }}" alt="">
                <img src="{{ asset('images/icon-insta.svg') }}" alt="">
            </div>
        </div>
        <hr class="xl:mx-10">
        <p class="py-8 text-sm xl:text-lg text-center">2022@ Qullqita Qatipay - Todos los derechos reservados</p>
    </footer>
    <div id="preloader">
        <div class="d-flex align-items-center justify-content-center h-50">
            <svg id="Capa_1" data-name="Capa 1" viewBox="0 0 536.65001 626.08001" version="1.1"
                sodipodi:docname="LogoCB Fundrasing.svg" width="134.1625" height="156.52"
                inkscape:version="1.1.2 (0a00cf5339, 2022-02-04)"
                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                xmlns:svg="http://www.w3.org/2000/svg">
                <sodipodi:namedview id="namedview65" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0"
                    inkscape:pageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0" showgrid="false"
                    inkscape:zoom="0.2912954" inkscape:cx="568.15178" inkscape:cy="588.74942"
                    inkscape:window-width="1366" inkscape:window-height="708" inkscape:window-x="0"
                    inkscape:window-y="0" inkscape:window-maximized="1" inkscape:current-layer="Capa_1" />
                <defs id="defs22">
                    <style id="style2">
                        .cls-1 {
                            font-size: 70px;
                            font-family: FranklinGothic-Medium, Franklin Gothic Medium;
                            font-weight: 500;
                            letter-spacing: 0.07em;
                        }

                        .cls-2 {
                            letter-spacing: 0.04em;
                        }

                        .cls-3 {
                            fill: #a65d16;
                        }

                        .cls-4 {
                            fill: #d8a709;
                        }

                        .cls-5 {
                            fill: url(#Degradado_sin_nombre_2);
                        }

                        .cls-6 {
                            fill: url(#Degradado_sin_nombre_2-2);
                        }

                        .cls-7 {
                            fill: url(#Degradado_sin_nombre_2-3);
                        }

                        .cls-8 {
                            fill: url(#Degradado_sin_nombre_2-4);
                        }

                        .cls-9 {
                            fill: url(#Degradado_sin_nombre_2-5);
                        }

                        .cls-10 {
                            fill: url(#Degradado_sin_nombre_2-6);
                        }

                        .cls-11 {
                            fill: url(#Degradado_sin_nombre_2-7);
                        }

                        .cls-12 {
                            fill: url(#Degradado_sin_nombre_2-8);
                        }

                        .cls-13 {
                            fill: url(#Degradado_sin_nombre_2-9);
                        }

                        .cls-14 {
                            fill: url(#Degradado_sin_nombre_2-10);
                        }

                        .cls-15 {
                            fill: url(#Degradado_sin_nombre_2-11);
                        }

                        .cls-16 {
                            fill: url(#Degradado_sin_nombre_2-12);
                        }

                        .cls-17 {
                            fill: url(#Degradado_sin_nombre_2-13);
                        }

                        .cls-18 {
                            fill: url(#Degradado_sin_nombre_2-14);
                        }

                        .cls-19 {
                            font-size: 50px;
                            font-family: MyriadPro-Regular, Myriad Pro;
                        }
                    </style>
                    <linearGradient id="Degradado_sin_nombre_2" x1="111.78" y1="612.78003" x2="531.53998"
                        y2="55.740002" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#d8a609" id="stop4" />
                        <stop offset="1" stop-color="#a65c05" id="stop6" />
                    </linearGradient>
                    <linearGradient id="Degradado_sin_nombre_2-2" x1="87.919998" y1="685.15997" x2="119.04"
                        y2="643.87" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-3" x1="132.91" y1="685.38" x2="164.32001"
                        y2="643.70001" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-4" x1="180.60001" y1="692.71002" x2="217.03999"
                        y2="644.34998" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-5" x1="228.3" y1="689.15997" x2="258.19"
                        y2="649.5" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-6" x1="277.19" y1="689.64001" x2="305.32001"
                        y2="652.31" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-7" x1="322.94" y1="698.17999" x2="353.48001"
                        y2="657.65002" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-8" x1="356.39999" y1="684.52002" x2="380.57999"
                        y2="652.42999" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-9" x1="385.29001" y1="686.66998" x2="412.76999"
                        y2="650.21002" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-10" x1="415.22" y1="684.52002" x2="439.41"
                        y2="652.42999" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-11" x1="444.94" y1="692.71002" x2="481.38"
                        y2="644.34998" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-12" x1="504.01999" y1="688.47998" x2="534.15002"
                        y2="648.48999" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-13" x1="137.67999" y1="468.07999" x2="339.37"
                        y2="200.42" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient id="Degradado_sin_nombre_2-14" x1="291.38" y1="479.87" x2="505.69"
                        y2="195.47" xlink:href="#Degradado_sin_nombre_2" />
                    <linearGradient inkscape:collect="always" xlink:href="#Degradado_sin_nombre_2"
                        id="linearGradient1218" gradientUnits="userSpaceOnUse" x1="111.78" y1="612.78003"
                        x2="531.53998" y2="55.740002" />
                </defs>
                <g id="g1216">
                    <path class="cls-5"
                        d="M 535.25,168.89 V 506 a 44.34,44.34 0 0 1 -44.33,44.34 H 153.8 L 100.14,604 h 401.57 a 87.2,87.2 0 0 0 87.2,-87.2 V 115.22 Z M 150.26,121 h 343 L 547,67.35 H 139.46 a 87.2,87.2 0 0 0 -87.2,87.2 V 562 l 53.67,-53.67 v -343 A 44.34,44.34 0 0 1 150.26,121 Z"
                        transform="translate(-52.26,-67.35)" id="path32" style="fill:url(#linearGradient1218)" />
                    <path class="cls-6"
                        d="m 96.08,645.64 h 25.31 v 6.24 h -19.15 v 11.4 h 19.15 v 6.16 h -19.08 v 21.87 h -6.23 z"
                        transform="translate(-52.26,-67.35)" id="path34"
                        style="fill:url(#Degradado_sin_nombre_2-2)" />
                    <path class="cls-7"
                        d="m 131.53,645.71 h 6.24 v 28.07 q 0,6.24 3,9.64 c 2,2.27 4.82,3.41 8.48,3.41 3.66,0 6.46,-1.05 8.48,-3.14 2.02,-2.09 3,-5 3,-8.83 V 645.71 H 167 v 28.71 q 0,8.4 -4.79,13.41 -4.79,5.01 -12.74,5 -8.15,0 -13,-5.09 -4.85,-5.09 -4.89,-15 z"
                        transform="translate(-52.26,-67.35)" id="path36"
                        style="fill:url(#Degradado_sin_nombre_2-3)" />
                    <path class="cls-8"
                        d="m 178.74,643.81 33.77,34.71 v -32.88 h 6.24 v 47.79 L 185,658.87 v 32.44 h -6.24 z"
                        transform="translate(-52.26,-67.35)" id="path38"
                        style="fill:url(#Degradado_sin_nombre_2-4)" />
                    <path class="cls-9"
                        d="m 231.15,645.64 h 11.08 q 13.16,0 19.57,7 a 22.76,22.76 0 0 1 6.42,15.88 22.34,22.34 0 0 1 -6.63,15.92 q -6.63,6.92 -19.29,6.92 h -11.15 z m 6.24,6.09 v 33.41 h 0.36 a 64.41,64.41 0 0 0 10.47,-0.62 17.48,17.48 0 0 0 6.67,-2.75 15.27,15.27 0 0 0 5,-5.61 16,16 0 0 0 1.87,-7.69 16.22,16.22 0 0 0 -3,-9.53 14.65,14.65 0 0 0 -7.11,-5.74 34.19,34.19 0 0 0 -11.13,-1.47 z"
                        transform="translate(-52.26,-67.35)" id="path40"
                        style="fill:url(#Degradado_sin_nombre_2-5)" />
                    <path class="cls-10"
                        d="m 279.41,645.64 h 9.89 q 7.38,0 12,3.67 a 11.5,11.5 0 0 1 4.64,9.41 12.1,12.1 0 0 1 -3,8.1 q -3,3.51 -9.37,4.95 l 13.27,19.54 h -7.16 L 287,672.52 h -1.4 v 18.79 h -6.23 z m 6.23,5.52 v 15.92 q 13.8,0.28 13.81,-8 a 7,7 0 0 0 -1.62,-4.75 8.09,8.09 0 0 0 -4.3,-2.51 35.36,35.36 0 0 0 -7.89,-0.66 z"
                        transform="translate(-52.26,-67.35)" id="path42"
                        style="fill:url(#Degradado_sin_nombre_2-6)" />
                    <path class="cls-11"
                        d="m 335.2,643.88 21.57,47.43 h -6.54 l -5.3,-11.69 h -19.38 l -5.24,11.69 h -6.49 z m 0,14.26 -7.31,16.28 h 14.69 z"
                        transform="translate(-52.26,-67.35)" id="path44"
                        style="fill:url(#Degradado_sin_nombre_2-7)" />
                    <path class="cls-12" d="m 365.41,645.64 h 6.16 v 45.67 h -6.16 z"
                        transform="translate(-52.26,-67.35)" id="path46"
                        style="fill:url(#Degradado_sin_nombre_2-8)" />
                    <path class="cls-13"
                        d="m 412.51,650.73 -5.05,4 a 20,20 0 0 0 -3.64,-3.1 8.89,8.89 0 0 0 -4.7,-1 9,9 0 0 0 -5.45,1.52 4.62,4.62 0 0 0 -2.1,3.91 4.74,4.74 0 0 0 1.83,3.66 25.45,25.45 0 0 0 6.23,3.49 44.07,44.07 0 0 1 6.85,3.52 17.1,17.1 0 0 1 4,3.6 13.63,13.63 0 0 1 3.11,8.77 13,13 0 0 1 -4.14,9.71 13.89,13.89 0 0 1 -10,4 16.94,16.94 0 0 1 -10.13,-3.14 19.63,19.63 0 0 1 -6.75,-9.41 l 6.23,-1.75 q 3.4,7.71 10.44,7.71 a 8.13,8.13 0 0 0 5.66,-2 6.63,6.63 0 0 0 2.26,-5.15 6.94,6.94 0 0 0 -1.19,-3.73 10.59,10.59 0 0 0 -2.94,-3.09 31.64,31.64 0 0 0 -5.59,-2.79 40,40 0 0 1 -5.91,-2.88 15.37,15.37 0 0 1 -3.58,-3.12 13.53,13.53 0 0 1 -2.21,-3.6 10.38,10.38 0 0 1 -0.7,-3.83 10.73,10.73 0 0 1 3.94,-8.37 14,14 0 0 1 9.57,-3.46 19.36,19.36 0 0 1 7.57,1.62 15.48,15.48 0 0 1 6.39,4.91 z"
                        transform="translate(-52.26,-67.35)" id="path48"
                        style="fill:url(#Degradado_sin_nombre_2-9)" />
                    <path class="cls-14" d="m 424.23,645.64 h 6.17 v 45.67 h -6.17 z"
                        transform="translate(-52.26,-67.35)" id="path50"
                        style="fill:url(#Degradado_sin_nombre_2-10)" />
                    <path class="cls-15"
                        d="m 443.09,643.81 33.77,34.71 v -32.88 h 6.23 v 47.79 l -33.77,-34.56 v 32.44 h -6.23 z"
                        transform="translate(-52.26,-67.35)" id="path52"
                        style="fill:url(#Degradado_sin_nombre_2-11)" />
                    <path class="cls-16"
                        d="m 539.56,653 -4.63,4.55 a 22.44,22.44 0 0 0 -16.17,-6.84 18.51,18.51 0 0 0 -13.37,5.15 17.59,17.59 0 0 0 -0.16,25.09 q 5.17,5.43 14.29,5.43 13.65,0 17.17,-11.87 h -12.33 v -6.24 h 19.46 a 35.5,35.5 0 0 1 -0.63,7.49 21.76,21.76 0 0 1 -2.59,6.15 22.15,22.15 0 0 1 -5.26,6 20.66,20.66 0 0 1 -7,3.82 31,31 0 0 1 -9,1.14 q -11.82,0 -18.87,-7.43 a 24,24 0 0 1 -7.05,-17 23.16,23.16 0 0 1 7.21,-17.14 24,24 0 0 1 17.46,-7.08 32.17,32.17 0 0 1 11.13,1.85 30.49,30.49 0 0 1 10.34,6.93 z"
                        transform="translate(-52.26,-67.35)" id="path54"
                        style="fill:url(#Degradado_sin_nombre_2-12)" />
                    <path class="cls-17"
                        d="m 257.2,410.66 h 58.52 v 36.72 q 0,36.27 -17.35,51.73 -17.35,15.46 -59.86,15.47 -41.83,0 -59.75,-15.68 -17.92,-15.68 -17.91,-51.48 V 221 q 0,-35.81 17.91,-51.59 17.91,-15.78 59.75,-15.79 41.61,0 59.41,15.69 17.8,15.69 17.8,51.73 v 36.72 H 257.2 q 0,-42.39 -1.78,-59 -1.56,-15.75 -5.79,-19.08 -1.78,-1.56 -11.12,-1.55 -14,0 -17.58,18 -1.12,5.55 -1.11,29.1 v 218.43 q 0,23.32 1.11,29.11 3.56,18 17.58,18 10.68,0 14.91,-7.57 3.78,-6.67 3.78,-72.54 z"
                        transform="translate(-52.26,-67.35)" id="path56"
                        style="fill:url(#Degradado_sin_nombre_2-13)" />
                    <path class="cls-18"
                        d="m 334.19,173 q 39.84,-19.35 77,-19.35 53.19,0 68.1,25.79 10,17.35 10,74.95 0,43.59 -27.15,62.49 27.15,19.13 27.15,64.71 v 52.48 q 0,78.06 -79.44,78.06 h -75.66 z m 58.53,130.41 h 21.9 q 15.93,0 15.48,-51.54 V 225 q -0.23,-23.53 -1.56,-30.43 -3.78,-19.55 -18,-19.55 -10.47,0 -17.8,2.89 z m 21.8,26.7 h -21.8 v 155.76 h 17.13 q 15.13,0 18.91,-22.25 1.33,-7.56 1.34,-34.05 V 384.4 q 0,-54.28 -15.58,-54.29 z"
                        transform="translate(-52.26,-67.35)" id="path58"
                        style="fill:url(#Degradado_sin_nombre_2-14)" />
                </g>
            </svg>
        </div>
    </div>
    <script src="{{ asset('js/header/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')
    <script>
        let preloader = document.getElementById('preloader');
        console.log(preloader, "preloader123");
        if (preloader) {
            window.addEventListener('load', () => {
                console.log("agregandose");
                preloader.remove()
            });
        }
    </script>
    <script>
        window.addEventListener('load', function() {
            console.log('La página ha terminado de cargarse!!');
        });
    </script>
</body>

</html>
