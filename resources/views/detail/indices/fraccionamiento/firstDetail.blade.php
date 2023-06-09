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
                            onclick="window.location='{{ url('/detail-government-level' . '/' . $primaryVariable . '/' . $period. '/monto') }}'">/
                            Entidades</span>
                    @elseif($ruta === 'entidad.deparment')
                        <span class="btn-preload"
                            onclick="window.location='{{ url('/detail-deparment-period' . '/' . $primaryVariable . '/' . $period. '/monto') }}'">/
                            Entidades </span>
                    @elseif($ruta === 'entidad.busqueda')
                        <span class="btn-preload"
                            onclick="window.location='{{ url('/ranking/entidad/' . $period . '/monto') }}'">/
                            Entidades</span>
                    @endif

                @endif


            </a>

            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                PROVEEDOR CON MÁS DE 3 CONTRATACIONES <br>
                {{ $nameEntidad }}
            </h2>
            <article
                class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                <header
                    class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-4 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                    <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                        Ruc

                    </p>
                    <p class="xl:col-span-1 font-semibold flex items-center">
                        Nombre

                    </p>


                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/first/fraccionamiento/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruta . '/'.$primaryVariable . '/cantidad' . '/' . $busquedaPalabra) }}
                    @else
                        {{ url('/detail/first/fraccionamiento/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruta . '/'.$primaryVariable . '/cantidad' . '/' . $busquedaPalabra) }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold flex items-center gap-2">
                        Cantidad
                        @if ($orderTable == 'cantidad')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif
                    </a>
                    <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/first/fraccionamiento/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruta . '/'.$primaryVariable . '/monto' . '/' . $busquedaPalabra) }}
                    @else
                        {{ url('/detail/first/fraccionamiento/' . $rucEntidad . '/' . $period . '/' . $nameEntidad . '/' . $ruta . '/'.$primaryVariable . '/monto' . '/' . $busquedaPalabra) }} @endif "
                        class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Monto
                        @if ($orderTable == 'monto')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif

                    </a>
                </header>
                <div
                    class="px-5 py-5 xl:py-0 grid xl:grid-cols-4 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                    @foreach ($result as $item)
                        <p class="xl:col-span-1 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Ruc:</span>
                            @if ($busquedaPalabra !== null)
                                <a class="btn-preload"
                                    href="{{ url('/detail/second/fraccionamiento/' . $item->ruc . '/' . $rucEntidad . '/' . $period . '/orden-compra' . '/' . $nameEntidad . '/' . $item->ruc . '/' . $item->nombre . '/' . $ruta . '/' . $primaryVariable . '/fecha_emision' . '/' . $busquedaPalabra) }}">{{ $item->ruc }}
                                </a>
                            @else
                                <a class="btn-preload"
                                    href="{{ url('/detail/second/fraccionamiento/' . $item->ruc . '/' . $rucEntidad . '/' . $period . '/orden-compra' . '/' . $nameEntidad . '/' . $item->ruc . '/' . $item->nombre . '/' . $ruta . '/' . $primaryVariable . '/fecha_emision') }}">{{ $item->ruc }}
                                </a>
                            @endif

                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Nombre:</span>
                            {{ $item->nombre }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Cantidad:</span>
                            {{ $item->cantidad }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Monto: </span>
                            <span> {{ number_format(round($item->monto, 2)) }}</span>
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
