@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">

                <span onclick="window.location='{{ url('/') }}'">Inicio </span>

                @if ($busquedaPalabra !== null)
                    <span
                        onclick="preloadActive2('proveedor', '<?php echo URL::to('ranking/proveedor/search'); ?>', '<?php echo $period; ?>', '<?php echo $busquedaPalabra; ?>' )">/
                        Proveedor</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/ranking/proveedor/' . $period . '/monto') }}'">/
                        Proveedor</span>
                @endif

                @if ($busquedaPalabra !== null)
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/orden-compra/first/proveedor/' . $rucContratista . '/' . $period . '/monto' . '/' . $nombre . '/' . $busquedaPalabra) }}'">/
                        1° Detalle</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/orden-compra/first/proveedor/' . $rucContratista . '/' . $period . '/monto' . '/' . $nombre) }}'">/
                        1° Detalle</span>
                @endif


            </a>



            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                ÓRDENES DE COMPRA <br> {{ $nombre }}<br> {{ $ruc }} <br>{{ $rucNombre }}
            </h2>

            <article
                class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                <header
                    class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-11 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">

                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/orden-compra/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/' . $ruc . '/' . $rucNombre . '/oc.fecha_emision' . '/' . $nombre . '/' . $busquedaPalabra) }}
                    @else
                       {{ url('/detail/orden-compra/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/' . $ruc . '/' . $rucNombre . '/oc.fecha_emision' . '/' . $nombre) }} @endif "
                        class="btn-preload xl:col-span-2 font-semibold flex items-center gap-2">
                        Fecha de emisión
                        @if ($orderTable == 'oc.fecha_emision')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                    <p class="xl:col-span-5 font-semibold flex items-center">
                        Descripción orden
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                        Orden
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Objeto contractual
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Moneda
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/orden-compra/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/' . $ruc . '/' . $rucNombre . '/monto_total_original' . '/' . $nombre . '/' . $busquedaPalabra) }}
                    @else
                       {{ url('/detail/orden-compra/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/' . $ruc . '/' . $rucNombre . '/monto_total_original' . '/' . $nombre) }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Monto Total
                        @if ($orderTable == 'monto_total_original')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                </header>
                <div
                    class="px-5 py-5 xl:py-0 grid xl:grid-cols-11 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                    @foreach ($result as $item)
                        <p class="xl:col-span-2 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Fecha de emisión:</span>
                            {{ $item->fecha_emision }}
                        </p>
                        <p class="xl:col-span-5 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Descripción orden:</span>
                            {{ $item->descripcion_orden }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Orden:</span>
                            {{ $item->orden }}
                        </p>

                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Objeto contractual: </span>
                            <span> {{ $item->objetocontractual }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                            <span> {{ $item->moneda }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Monto Total: </span>
                            <span> {{ number_format(round($item->monto_total_original, 2)) }}</span>
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
