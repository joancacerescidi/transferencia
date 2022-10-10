@extends('layout.app')
@section('content')
    <section class="u-container">
        <a href="{{ url('/') }}"
            class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
            <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">
            Volver
        </a>
        <h2 class="text-center text-xl xl:text-4xl font-bold mb-14">
            Resultados de “{{ $palabra }}”
        </h2>
        <form class="mb-14" method="POST" action="{{ route('busqueda') }}">
            @csrf
            <div class="relative xl:w-1/3 mx-auto mb-14">
                <input
                    class="font-semibold block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                    type="text" placeholder="Buscar entidad del estado" name="clave" value="<?= $palabra ?>" required>
                <button type="submit" class="absolute top-5 right-5">
                    <img src="{{ asset('images/icon-buscar.png') }}" alt="Buscar">
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
            @foreach ($result as $item)
                <details
                    class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 xl:mb-10 cursor-pointer hover:shadow-lg">
                    <summary
                        class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                        <p class="col-span-1 order-1">{{ $item->order }}</p>
                        <img class="col-span-1 hidden xl:block xl:order-2"
                            src="{{ asset('images/icon-ministerio-defensa.png') }}"
                            alt="Ministerio de relaciones exteriores">
                        <p class="col-span-4 xl:col-span-6 order-2 xl:order-3">{{ $item->nombre }}</p>
                        <p class="col-span-6 xl:col-span-2 text-main-red order-4 xl:order-3 text-xs xl:text-lg">
                            <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                            <span>S/ {{ $item->riesgo }} mill.</span>
                        </p>
                        <p class="col-span-1 text-main-red flex items-center gap-2 order-3 xl:order-4">
                            <img src="{{ asset('images/icon-estrella.png') }}" class="mb-1">
                            {{ $item->nota }}
                        </p>
                        <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                            <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                            <img src="{{ asset('images/icon-chevron-down.png') }}" class="inline">
                        </p>
                    </summary>
                    <ul class="p-6 xl:pl-8 xl:pb-10 xl:w-2/3 mx-auto grid gap-4 xl:gap-8 text-xs xl:text-base">
                        @foreach ($item->category as $categorias)
                            <li class="flex items-center justify-between gap-4">
                                <p class="flex items-center gap-3 font-medium">
                                    {{ $categorias->name }}
                                    <a href="{{ url('/detalle') }}"><img src="{{ asset('images/icon-compartir.png') }}"
                                            alt="Compartir"></a>
                                </p>
                                <p class="flex items-center gap-8 xl:gap-24">
                                    <span class="xl:mr-12 block">{{ $categorias->riesgo }} mill.</span>
                                    <span class="xl:-mr-8 block">{{ $categorias->nota }}</span>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </details>
            @endforeach
        </article>
    </section>
@stop
