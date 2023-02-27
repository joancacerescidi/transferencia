@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">
                <span class="btn-preload" onclick="window.location='{{ url('/') }}'">Inicio</span>

                @if ($busquedaPalabra !== null && $busquedaPalabra !== 'default')
                    <span
                        onclick="preloadActive2('entidad', '<?php echo URL::to('ranking/entidad/search'); ?>', '<?php echo $period; ?>', '<?php echo $busquedaPalabra; ?>' )">/
                        Entidades</span>
                @else
                    @if ($ruta === 'entidad.goverment')
                        <span class="btn-preload"
                            onclick="window.location='{{ url('/detail-government-level' . '/' . $primaryVariable . '/' . $period . '/monto') }}'">/
                            Entidades</span>
                    @elseif($ruta === 'entidad.deparment')
                        <span class="btn-preload"
                            onclick="window.location='{{ url('/detail-deparment-period' . '/' . $primaryVariable . '/' . $period . '/monto') }}'">/
                            Entidades</span>
                    @elseif($ruta === 'entidad.busqueda')
                        <span class="btn-preload"
                            onclick="window.location='{{ url('/ranking/entidad/' . $period . '/monto') }}'">/
                            Entidades</span>
                    @endif
                @endif

                @if ($busquedaPalabra !== null)
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/first/pmr/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruta . '/' . $primaryVariable . '/monto' . '/' . $busquedaPalabra) }}'">/
                        Proveedor</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/first/pmr/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruta . '/' . $primaryVariable . '/monto') }}'">/
                        Proveedor</span>
                @endif

            </a>

            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                PROVEEDOR CON MISMO REPRESENTANTE <br>
                {{ $nameEntidad }}<br> {{ $ruc }}<br> {{ $nameRuc }}
            </h2>
            <section class="u-container">
                <details
                    class="w-8/12 mx-auto bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg"
                    open>
                    <summary class="p-6 xl:p-10 flex items-center justify-center gap-4 text-sm xl:text-lg font-bold">
                        <p class="line-clamp-2">
                            CONFORMACIÓN
                        </p>
                    </summary>

                    <ul class="p-6 xl:p-10 xl:pt-5 grid gap-4 xl:gap-8 text-xs xl:text-base">
                        <li class="grid items-center grid-cols-3 gap-4">
                            <p class="flex items-center font-bold">
                                Documento
                            </p>
                            <p class="text-right font-bold"> Nombre</p>
                            <p class="text-right font-bold"> Relación</p>
                        </li>
                        @foreach ($conformacion as $item)
                            <li class="grid items-center grid-cols-3 gap-4">
                                <p class="flex items-center gap-3 font-medium">
                                    {{ $item->numero_documento }}

                                </p>
                                <p class="text-right"> {{ $item->nombre }}</p>
                                <p class="text-right"> {{ $item->tipo_conf_juridica }}</p>
                            </li>
                        @endforeach

                    </ul>
                </details>
            </section>



            <article
                class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                <header
                    class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-9 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                    <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                        Número Contrato
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>


                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/second/pmr/' . $rucContratista . '/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruc . '/' . $nameRuc . '/' . $ruta . '/' . $primaryVariable . '/fecha_suscripcion_contrato' . '/' . $busquedaPalabra) }}
                    @else
                        {{ url('/detail/second/pmr/' . $rucContratista . '/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruc . '/' . $nameRuc . '/' . $ruta . '/' . $primaryVariable . '/fecha_suscripcion_contrato') }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold flex items-center">
                        Fecha Suscripción Contrato
                        @if ($orderTable == 'fecha_suscripcion_contrato')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                    <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                        Descripción Proceso
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Url Contrato
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Moneda
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>


                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/second/pmr/' . $rucContratista . '/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruc . '/' . $nameRuc . '/' . $ruta . '/' . $primaryVariable . '/monto_contratado_item' . '/' . $busquedaPalabra) }}
                    @else
                        {{ url('/detail/second/pmr/' . $rucContratista . '/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruc . '/' . $nameRuc . '/' . $ruta . '/' . $primaryVariable . '/monto_contratado_item') }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Monto Contratado
                        @if ($orderTable == 'monto_contratado_item')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                    <p class="xl:col-span-3 font-semibold hidden xl:flex items-center gap-2">
                        Representantes de los postores en la misma convocatoria
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                </header>
                <div
                    class="px-5 py-5 xl:py-0 grid xl:grid-cols-9 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                    @foreach ($result as $item)
                        <p class="xl:col-span-1 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Número Contrato:</span>
                            {{ $item->numero_contrato }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Fecha Suscripción Contrato:</span>
                            {{ $item->fecha_suscripcion_contrato }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Descripción Proceso:</span>
                            {{ $item->descripcion_proceso }}
                        </p>

                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Url Contrato: </span>
                            <span> <a class="text-[blue]" href="{{ $item->urlcontrato }}" target="_Blank">Url
                                    Contrato</a></span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                            <span> {{ $item->moneda }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Monto Contratado: </span>
                            <span> {{ number_format(round($item->monto_contratado_item, 2)) }}</span>
                        </p>
                        <p class="xl:col-span-3 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Representantes de los postores en la misma
                                convocatoria: </span>
                            <span> {{ $item->rep1 }}</span>
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
