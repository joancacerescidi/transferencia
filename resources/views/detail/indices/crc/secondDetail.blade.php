@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">
                <span class="btn-preload" onclick="window.location='{{ url('/') }}'">Inicio</span>

                @if ($busquedaPalabra !== null&& $busquedaPalabra !== 'default')
                    <span
                        onclick="preloadActive2('entidad', '<?php echo URL::to('ranking/entidad/search'); ?>', '<?php echo $period; ?>', '<?php echo $busquedaPalabra; ?>' )">/
                        Entidades</span>
                @else
                    @if ($ruta === 'entidad.goverment')
                        <span class="btn-preload"
                            onclick="window.location='{{ url('/detail-government-level' . '/' . $primaryVariable . '/' . $period) }}'">/
                            Entidades</span>
                    @elseif($ruta === 'entidad.deparment')
                        <span class="btn-preload"
                            onclick="window.location='{{ url('/detail-deparment-period' . '/' . $primaryVariable . '/' . $period) }}'">/
                            Entidades</span>
                    @elseif($ruta === 'entidad.busqueda')
                        <span class="btn-preload"
                            onclick="window.location='{{ url('/ranking/entidad/' . $period . '/monto') }}'">/
                            Entidades</span>
                    @endif
                @endif

                @if ($busquedaPalabra !== null)
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/first/crc/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruta . '/' . $primaryVariable . '/monto' . '/' . $busquedaPalabra) }}'">/
                        Proveedor</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/first/crc/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruta . '/' . $primaryVariable . '/monto') }}'">/
                        Proveedor</span>
                @endif

            </a>
            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                CONSORCIO CON PROVEEDORES RECIÉN CREADOS <br> {{ $nameEntidad }}<br> {{ $ruc }}<br>
                {{ $nameRuc }}
            </h2>
            <article
                class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                <header
                    class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-11 gap-4 items-center text-xs xl:text-sm mb-6 xl:mb-14 xl:overflow-x-auto u-table-row">


                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/second/crc/' . $rucContratista . '/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruc . '/' . $ruta . '/' . $primaryVariable . '/fecha_suscripcion_contrato' . '/' . $nameRuc . '/' . $busquedaPalabra) }}
                    @else
                        {{ url('/detail/second/crc/' . $rucContratista . '/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruc . '/' . $ruta . '/' . $primaryVariable . '/fecha_suscripcion_contrato' . '/' . $nameRuc) }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold flex items-center gap-2">
                        Fecha Suscripcion Contrato
                        @if ($orderTable == 'fecha_suscripcion_contrato')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                    <p class="xl:col-span-2 font-semibold flex items-center">
                        Descripcion Proceso
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                        Num Contrato
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2 ">
                        Url Contrato
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Moneda
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/second/crc/' . $rucContratista . '/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruc . '/' . $ruta . '/' . $primaryVariable . '/monto_contratado_item' . '/' . $nameRuc . '/' . $busquedaPalabra) }}
                    @else
                        {{ url('/detail/second/crc/' . $rucContratista . '/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruc . '/' . $ruta . '/' . $primaryVariable . '/monto_contratado_item' . '/' . $nameRuc) }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Monto Contratado
                        @if ($orderTable == 'monto_contratado_item')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Ruc Miembro
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Nombre
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Fecha Inicio
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>

                </header>
                <div
                    class="px-5 py-5 xl:py-0 grid xl:grid-cols-11 items-start gap-4 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0 xl:overflow-x-auto u-table-row">
                    @foreach ($result as $item)
                        <p class="xl:col-span-1 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Fecha Suscripcion Contrato:</span>
                            {{ $item->fecha_suscripcion_contrato }}
                        </p>
                        <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Descripcion Proceso:</span>
                            {{ $item->descripcion_proceso }}
                        </p>
                        <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8 text-xs">
                            <span class="text-main-gray font-medium xl:hidden"> Num Contrato:</span>
                            {{ $item->num_contrato }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 ">
                            <span class="text-main-gray font-medium xl:hidden">Url Contrato: </span>
                            <span> <a class="text-[blue]" href="{{ $item->urlcontrato }}" target="_Blank">Url
                                    Contrato</a></span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 ">
                            <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                            <span> {{ $item->moneda }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Monto Contratado: </span>
                            <span> {{ number_format($item->monto_contratado_item) }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Ruc Miembro: </span>
                            <span> {{ $item->ruc_miembro }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Nombre: </span>
                            <span> {{ $item->nombre }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden"> Fecha Inicio: </span>
                            <span> {{ $item->fechainicio }}</span>
                        </p>
                    @endforeach
                </div>
                <!-- Cuando no hay data -->
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
