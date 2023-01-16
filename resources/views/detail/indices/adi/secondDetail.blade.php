@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">
                <span class="btn-preload" onclick="window.location='{{ url('/') }}'">Inicio</span>

                @if ($busquedaPalabra !== null)
                    <span class="btn-preload" onclick="javascript:document.busquedaEntidad.submit()">/ Entidades</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/ranking/entidad/' . $period . '/monto') }}'">/ Entidades</span>
                @endif

                @if ($busquedaPalabra !== null)
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/first/adi/' . $rucEntidad . '/' . $period . '/' . $busquedaPalabra) }}'">/
                        Proveedor</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/first/adi/' . $rucEntidad . '/' . $period) }}'">/
                        Proveedor</span>
                @endif
                @if ($busquedaPalabra !== null)
                    <form onsubmit='return preloadActive()' action="{{ route('entidad.busqueda', [$period, 'monto']) }}"
                        method="POST" name="busquedaEntidad" id="busquedaEntidad">
                        @csrf
                        <input type="hidden" name="palabraClave" value="{{ $busquedaPalabra }}">
                    </form>
                @endif
            </a>

            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                ADI segundo detalle
            </h2>

            </div>
            <article
                class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                <header
                    class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-9 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                    <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                        Fecha Emisión
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-2 font-semibold flex items-center">
                        Descripción Orden
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                        Orden
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Objeto Contractual
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Moneda
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Monto Total
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-2 font-semibold hidden xl:flex items-center gap-2">
                        Tipo Contratación
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                </header>
                <div
                    class="px-5 py-5 xl:py-0 grid xl:grid-cols-9 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                    @foreach ($result as $item)
                        <p class="xl:col-span-1 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Fecha Emisión:</span>
                            {{ $item->fecha_emision }}
                        </p>
                        <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Descripción Orden:</span>
                            {{ $item->descripcion_orden }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Orden:</span>
                            {{ $item->orden }}
                        </p>

                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Objeto Contractual: </span>
                            <span> {{ $item->objetocontractual }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                            <span> {{ $item->moneda }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Monto Total: </span>
                            <span> {{ $item->monto_total_original }}</span>
                        </p>
                        <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Tipo Contratación: </span>
                            <span> {{ $item->tipocontratacion }}</span>
                        </p>
                    @endforeach
                </div>
                @if (count($result->items()) == 0)
                    <p class=" text-center text-sm xl:text-base font-semibold">Sin Datos</p>
                @endif
            </article>
            <div class="flex justify-center py-8">
                {{ $result->links() }}
            </div>

        </section>
    </main>
@stop
