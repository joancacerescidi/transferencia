@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ secure_asset('images/icon-chevron-left-blue.png') }}" alt="">

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
                        onclick="window.location='{{ url('/detail/postulaciones/first/proveedor/' . $rucContratista . '/' . $period . '/cantidad' . '/' . $nombre . '/' . $busquedaPalabra) }}'">/
                        1° Detalle</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/postulaciones/first/proveedor/' . $rucContratista . '/' . $period . '/cantidad' . '/' . $nombre) }}'">/
                        1° Detalle</span>
                @endif


            </a>



            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                POSTULACIÓN <br> {{ $nombre }}<br> {{ $ruc }} <br>{{ $rucNombre }}
            </h2>

            <article
                class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                <header
                    class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-11 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                    <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                        Proceso
                        {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-4 font-semibold flex items-center">
                        Descipción Item
                        {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                        Objeto Contractual
                        {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Moneda
                        {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>


                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/postulaciones/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/' . $ruc . '/' . $rucNombre . '/oc.fecha_convocatoria' . '/' . $nombre . '/' . $busquedaPalabra) }}
                    @else
                  
                       {{ url('/detail/postulaciones/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/' . $ruc . '/' . $rucNombre . '/oc.fecha_convocatoria' . '/' . $nombre) }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Monto Referencial Item
                        @if ($orderTable == 'oc.fecha_convocatoria')
                            <img src="{{ secure_asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Fecha Convocatoria
                        {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/postulaciones/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/' . $ruc . '/' . $rucNombre . '/oc.monto_referencial_item' . '/' . $nombre . '/' . $busquedaPalabra) }}
                    @else
                  
                       {{ url('/detail/postulaciones/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/' . $ruc . '/' . $rucNombre . '/oc.monto_referencial_item' . '/' . $nombre) }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Fecha Presentación Propuesta
                        @if ($orderTable == 'oc.monto_referencial_item')
                            <img src="{{ secure_asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                </header>
                <div
                    class="px-5 py-5 xl:py-0 grid xl:grid-cols-11 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                    @foreach ($result as $item)
                        <p class="xl:col-span-2 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Proceso:</span>
                            {{ $item->proceso }}
                        </p>
                        <p class="xl:col-span-4 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Descipción Item:</span>
                            {{ $item->descripcion_item }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Objeto Contractual:</span>
                            {{ $item->objeto_contractual }}
                        </p>

                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                            <span> {{ $item->moneda }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Monto Referencial Item: </span>
                            <span> {{ number_format(round($item->monto_referencial_item, 2)) }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden"> Fecha Convocatoria: </span>
                            <span> {{ $item->fecha_convocatoria }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Fecha Presentación Propuesta: </span>
                            <span> {{ $item->fecha_presentacion_propuesta }}</span>
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
