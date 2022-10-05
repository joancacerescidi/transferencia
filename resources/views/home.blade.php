@extends('layout.app')
@section('index-content')
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
        <section class="section-hero text-white">
            <article class="u-container py-28">
                <h1 class="font-bold text-4xl mb-4">
                    Encuentra posibles <br>
                    irregularidades en el Estado
                </h1>
                <p class="mb-14 opacity-80">Usamos información de fuentes oficiales a través del Open Data.</p>
                <a href="#" class="py-4 px-8 text-lg font-bold bg-main-blue rounded-xl">Ir al Ranking</a>
            </article>
        </section>
        <section class="u-container">
            <h2 class="text-center text-4xl font-bold mb-14">
                Ranking en transparencia de compras <br>
                y ejecución de contratos
            </h2>
            <form class="mb-14">
                <div class="relative w-1/3 mx-auto mb-14">
                    <input
                        class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                        type="text" placeholder="Buscar entidad del estado">
                    <button type="button" class="absolute top-5 right-5">
                        <img src="{{ asset('images/icon-buscar.png') }}" alt="Buscar">
                    </button>
                </div>
                <div class="grid grid-cols-12 items-center gap-8">
                    <p class="col-span-2 text-lg font-bold text-main-gray">Filtros</p>
                    <div class="col-span-10 grid grid-cols-3 gap-8">
                        <select
                            class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                            name="" id="">
                            <option value="00" selected hidden>Poder Ejecutivo</option>
                        </select>
                        <select
                            class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                            name="" id="">
                            <option value="00" selected hidden>Consejo de Ministros</option>
                        </select>
                        <select
                            class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                            name="" id="">
                            <option value="00" selected hidden>Todos (10)</option>
                        </select>
                    </div>
                </div>
            </form>
            <article>
                <header class="grid grid-cols-12 mb-8 text-main-gray text-lg">
                    <p class="col-span-1 pl-10">#</p>
                    <p class="col-span-7 pl-10">Nombre</p>
                    <p class="col-span-2">En reisgo</p>
                    <p class="col-span-2">Nota</p>
                </header>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">1</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-relaciones-exteriores.png') }}"
                            alt="Ministerio de relaciones exteriores">
                        <p class="col-span-6">Ministerio de Relaciones Exteriores</p>
                        <p class="col-span-2 text-main-red">S/ 400 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            9.8
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">2</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-defensa.png') }}"
                            alt="Ministerio de Defensa">
                        <p class="col-span-6">Ministerio de Defensa</p>
                        <p class="col-span-2 text-main-red">S/ 364 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            9.2
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">3</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-economia.png') }}"
                            alt="Ministerio de Economía y Finanzas">
                        <p class="col-span-6">Ministerio de Economía y Finanzas</p>
                        <p class="col-span-2 text-main-red">S/ 324 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            8.3
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">4</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-interior.png') }}"
                            alt="Ministerio del Interior">
                        <p class="col-span-6">Ministerio del Interior</p>
                        <p class="col-span-2 text-main-red">S/ 256 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            7.4
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">5</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-justicia.png') }}"
                            alt="Ministerio de Justicia y Derechos Humanos">
                        <p class="col-span-6">Ministerio de Justicia y Derechos Humanos</p>
                        <p class="col-span-2 text-main-red">S/ 210 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            7.1
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">6</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-educacion.png') }}"
                            alt="Ministerio de Educación">
                        <p class="col-span-6">Ministerio de Educación</p>
                        <p class="col-span-2 text-main-red">S/ 207 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            6.5
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">7</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-agricola.png') }}"
                            alt="Ministerio de Agricultura y Riego">
                        <p class="col-span-6">Ministerio de Agricultura y Riego</p>
                        <p class="col-span-2 text-main-red">S/ 185 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            5.0
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">8</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-empleo.png') }}"
                            alt="Ministerio de Promoción del Empleo">
                        <p class="col-span-6">Ministerio de Promoción del Empleo</p>
                        <p class="col-span-2 text-main-red">S/ 150 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            4.8
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">9</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-produccion.png') }}"
                            alt="Ministerio de Producción">
                        <p class="col-span-6">Ministerio de Producción</p>
                        <p class="col-span-2 text-main-red">S/ 120 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            4.2
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
                <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                    <summary class="p-10 grid grid-cols-12 items-center text-lg font-bold">
                        <p class="col-span-1">10</p>
                        <img class="col-span-1" src="{{ asset('images/icon-ministerio-comercio-exterior.png') }}"
                            alt="Ministerio de Comercio Exterior y Turismo">
                        <p class="col-span-6">Ministerio de Comercio Exterior y Turismo</p>
                        <p class="col-span-2 text-main-red">S/ 80 mill.</p>
                        <p class="col-span-1 text-main-red flex items-center gap-2">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            3.0
                        </p>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="col-span-1">
                    </summary>
                    <ul class="pl-8 pb-10 w-2/3 mx-auto grid gap-8">
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Fraccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Direccionamientos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contrataciones directas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratistas oportunistas
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Prohibiciones familiares
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Proveedores riesgosos
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio oportunista
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Consorcio fantasma
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Procesos acelerados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra en riesgo
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                        <li class="flex items-center justify-between">
                            <p class="flex items-center gap-3 font-medium">
                                Contratos de obra atrasados
                                <a href="#"><img src="{{ asset('images/icon-compartir.png') }}"
                                        alt="Compartir"></a>
                            </p>
                            <p class="flex items-center gap-24">
                                <span class="mr-12 block">7 mill.</span>
                                <span class="-mr-12 block">8.3</span>
                            </p>
                        </li>
                    </ul>
                </details>
            </article>
        </section>
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
@stop
