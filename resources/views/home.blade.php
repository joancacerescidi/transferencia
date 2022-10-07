@extends('layout.app')
@section('content')


    <section class="section-hero text-white">
        <article class="u-container py-28 text-center xl:text-left">
            <h1 class="font-bold text-2xl xl:text-4xl mb-4">
                Encuentra posibles <br> irregularidades en el Estado
            </h1>
            <p class="mb-14 opacity-80 text-sm xl:text-base">Usamos información de fuentes oficiales a través del Open Data.
            </p>
            <a href="#" class="py-4 px-8  font-bold bg-main-blue rounded-xl text-sm xl:text-base">Ir al
                Ranking</a>
        </article>
    </section>
    <section class="u-container">
        <h2 class="text-center text-xl xl:text-4xl font-bold mb-14">
            Ranking en transparencia de compras <br class="hidden xl:block"> y ejecución de contratos <br class="hidden xl:block"> Período : Hasta Setiembre 2022
        </h2>
        <form class="mb-14">
            <div class="relative xl:w-1/3 mx-auto mb-14">
                <input
                    class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                    type="text" placeholder="Buscar entidad del estado" value="Ministerio">
                  
                <button type="button" class="absolute top-5 right-5">
                    <a href="{{ url('/search') }}">
                    <img src="{{ asset('images/icon-buscar.png') }}" alt="Buscar">
                    </a>
                </button>
            </div>
            {{-- <div class="grid xl:grid-cols-12 items-center gap-4 xl:gap-8">
                <p class="xl:col-span-2 text-lg font-bold text-main-gray">Filtros</p>
                <div class="xl:col-span-10 grid xl:grid-cols-3 gap-4 xl:gap-8">
                    <select
                        class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                        name="" id="">
                        <option value="00" selected hidden>Poder Ejecutivo</option>
                        <option value="1">Opciona 1</option>
                        <option value="1">Opciona 2</option>
                        <option value="1">Opciona 3</option>
                        <option value="1">Opciona 4</option>
                    </select>
                    <select
                        class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                        name="" id="">
                        <option value="00" selected hidden>Consejo de Ministros</option>
                        <option value="1">Opciona 1</option>
                        <option value="1">Opciona 2</option>
                        <option value="1">Opciona 3</option>
                        <option value="1">Opciona 4</option>

                    </select>
                    <select
                        class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                        name="" id="">
                        <option value="00" selected hidden>Todos (10)</option>
                        <option value="1">Opciona 1</option>
                        <option value="1">Opciona 2</option>
                        <option value="1">Opciona 3</option>
                        <option value="1">Opciona 4</option>

                    </select>
                </div>
            </div> --}}
        </form>
        <article>
            <header class="grid grid-cols-6 xl:grid-cols-12 mb-8 text-main-gray text-sm xl:text-lg">
                <p class="col-span-1 pl-6 xl:pl-10">#</p>
                <p class="col-span-4 xl:col-span-7 pl-4 xl:pl-10">Nombre</p>
                <p class="col-span-2 hidden xl:block">En reisgo</p>
                <p class="col-span-1 xl:col-span-2">Nota</p>
            </header>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">1</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-relaciones-exteriores.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Relaciones Exteriores</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 400 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 9.8
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Direccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Contrataciones directas
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Contratistas oportunistas
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Prohibiciones familiares
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Contratos de obra atrasados
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Proveedores riesgosos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Consorcio oportunista
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Consorcio fantasma
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Procesos acelerados
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Contratos de obra en riesgo
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Contratos de obra atrasados
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">2</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-defensa.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Defensa</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 364 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 9.2
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">3</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-economia.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Economía y Finanzas</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 324 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 8.3
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">4</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-interior.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio del Interior</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 256 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 7.4
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">5</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-justicia.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Justicia y Derechos Humanos</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 210 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 7.1
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">6</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-educacion.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Educación</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 207 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 6.5
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">7</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-agricola.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Agricultura y Riego</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 185 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 5.0
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">8</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-empleo.png') }}" alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Promoción del Empleo</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 150 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 4.8
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">9</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-produccion.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Producción</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 120 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 4.2
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
            <details class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <summary
                    class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                    <p class="col-span-1 order-1">10</p>
                    <img class="col-span-1 hidden xl:block xl:order-2"
                        src="{{ asset('images/icon-ministerio-comercio-exterior.png') }}"
                        alt="Ministerio de relaciones exteriores">
                    <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">Ministerio de Comercio Exterior y Turismo</p>
                    <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                        <span>S/ 80 mill.</span>
                    </p>
                    <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                        <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1"> 3.0
                    </p>
                    <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                        <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                    </p>
                </summary>
                <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                    <li class="flex items-center justify-between gap-4">
                        <p class="flex items-center gap-3 font-medium">
                            Fraccionamientos
                            <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}" alt="Compartir"></a>
                        </p>
                        <p class="flex items-center gap-8 xl:gap-24">
                            <span class="xl:mr-12 block">7 mill.</span>
                            <span class="xl:-mr-8 block">8.3</span>
                        </p>
                    </li>
                </ul>
            </details>
        </article>
    </section>


@stop
