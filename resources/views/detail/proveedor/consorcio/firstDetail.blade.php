@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ secure_asset('images/icon-chevron-left-blue.png') }}" alt="">

                <span class="btn-preload" onclick="window.location='{{ url('/') }}'">Inicio </span>
                @if ($busquedaPalabra !== null)
                    <span
                        onclick="preloadActive2('proveedor', '<?php echo URL::to('ranking/proveedor/search'); ?>', '<?php echo $period; ?>', '<?php echo $busquedaPalabra; ?>' )">/
                        Proveedor</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/ranking/proveedor/' . $period . '/monto') }}'">/
                        Proveedor</span>
                @endif



            </a>

            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                CONSORCIO <br> {{ $nombre }}
            </h2>
            <div class="flex flex-wrap font-semibold text-xs xl:text-base gap-4 mb-4">
                @if ($busquedaPalabra !== null)
                    <button
                        onclick="window.location='{{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/orden-compra' . '/monto' . '/' . $nombre . '/' . $busquedaPalabra) }}'"
                        class="btn-preload p-4 bg-white transition-colors shadow-sm rounded-md ring @if ($filter == 'orden-compra') ring-blue-500
                    @else
                        ring-gray-100 @endif   ring-offset-2">Compra</button>
                    <button
                        onclick="window.location='{{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/contrato' . '/monto' . '/' . $nombre . '/' . $busquedaPalabra) }}'"
                        class="btn-preload p-4 bg-white transition-colors shadow-sm rounded-md ring @if ($filter == 'contrato') ring-blue-500
                    @else
                        ring-gray-100 @endif ring-offset-2">Contrato</button>
                @else
                    <button
                        onclick="window.location='{{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/orden-compra' . '/monto' . '/' . $nombre) }}'"
                        class="btn-preload p-4 bg-white transition-colors shadow-sm rounded-md ring @if ($filter == 'orden-compra') ring-blue-500
                    @else
                        ring-gray-100 @endif   ring-offset-2">Compra</button>
                    <button
                        onclick="window.location='{{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/contrato' . '/monto' . '/' . $nombre) }}'"
                        class="btn-preload p-4 bg-white transition-colors shadow-sm rounded-md ring @if ($filter == 'contrato') ring-blue-500
                    @else
                        ring-gray-100 @endif ring-offset-2">Contrato</button>
                @endif

            </div>
            @if ($filter == 'orden-compra')
                <article
                    class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                    <header
                        class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-4 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                        <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                            Ruc Entidad
                            {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold flex items-center">
                            Entidad
                            {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/orden-compra' . '/cantidad' . '/' . $nombre . '/' . $busquedaPalabra) }}
                    @else
                       {{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/orden-compra' . '/cantidad' . '/' . $nombre) }} @endif "
                            class="btn-preload xl:col-span-1 font-semibold flex items-center gap-2">
                            Cantidad
                            @if ($orderTable == 'cantidad')
                                <img src="{{ secure_asset('images/icon-chevron-up.png') }}" alt="w-max">
                            @else
                                <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                            @endif
                        </a>
                        <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/orden-compra' . '/monto' . '/' . $nombre . '/' . $busquedaPalabra) }}
                    @else
                       {{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/orden-compra' . '/monto' . '/' . $nombre) }} @endif "
                            class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                            Monto
                            @if ($orderTable == 'monto')
                                <img src="{{ secure_asset('images/icon-chevron-up.png') }}" alt="w-max">
                            @else
                                <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                            @endif
                        </a>
                    </header>
                    <div
                        class="px-5 py-5 xl:py-0 grid xl:grid-cols-4 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                        @foreach ($result as $item)
                            <p class="xl:col-span-1 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Ruc Entidad:</span>
                                @if ($busquedaPalabra !== null)
                                    <a class="btn-preload"
                                        href="{{ url('/detail/consorcio/second/proveedor/' . $item->ruc_entidad . '/' . $rucContratista . '/' . $period . '/orden-compra' . '/' . $item->ruc_entidad . '/' . $item->entidad . '/fecha_emision' . '/' . $nombre . '/' . $busquedaPalabra) }}">{{ $item->ruc_entidad }}</a>
                                @else
                                    <a class="btn-preload"
                                        href="{{ url('/detail/consorcio/second/proveedor/' . $item->ruc_entidad . '/' . $rucContratista . '/' . $period . '/orden-compra' . '/' . $item->ruc_entidad . '/' . $item->entidad . '/fecha_emision' . '/' . $nombre) }}">{{ $item->ruc_entidad }}</a>
                                @endif

                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Entidad:</span>
                                {{ $item->entidad }}
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Cantidad:</span>
                                {{ $item->cantidad }}
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Monto: </span>
                                <span> {{ $item->monto }}</span>
                            </p>
                        @endforeach

                    </div>
                    @if (count($result->items()) == 0)
                        <p class=" text-center text-sm xl:text-base font-semibold">Sin Datos</p>
                    @endif
                </article>
            @elseif($filter == 'contrato')
                <article
                    class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                    <header
                        class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-4 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                        <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                            Ruc Entidad
                            {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold flex items-center">
                            Nombre Entidad
                            {{-- <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/contrato' . '/cantidad' . '/' . $nombre . '/' . $busquedaPalabra) }}
                    @else
                       {{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/contrato' . '/cantidad' . '/' . $nombre) }} @endif "
                            class="btn-preload xl:col-span-1 font-semibold flex items-center gap-2">
                            Cantidad
                            @if ($orderTable == 'cantidad')
                                <img src="{{ secure_asset('images/icon-chevron-up.png') }}" alt="w-max">
                            @else
                                <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                            @endif
                        </a>
                        <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/contrato' . '/monto' . '/' . $nombre . '/' . $busquedaPalabra) }}
                    @else
                       {{ url('/detail/consorcio/first/proveedor/' . $rucContratista . '/' . $period . '/contrato' . '/monto' . '/' . $nombre) }} @endif "
                            class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                            Monto
                            @if ($orderTable == 'monto')
                                <img src="{{ secure_asset('images/icon-chevron-up.png') }}" alt="w-max">
                            @else
                                <img src="{{ secure_asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                            @endif
                        </a>
                    </header>
                    <div
                        class="px-5 py-5 xl:py-0 grid xl:grid-cols-4 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                        @foreach ($result as $item)
                            <p class="xl:col-span-1 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Ruc Entidad:</span>

                                @if ($busquedaPalabra !== null)
                                    <a class="btn-preload"
                                        href="{{ url('/detail/consorcio/second/proveedor/' . $item->ruc_entidad . '/' . $rucContratista . '/' . $period . '/contrato' . '/' . $item->ruc_entidad . '/' . $item->nombre_entidad . '/fecha_suscripcion_contrato' . '/' . $nombre . '/' . $busquedaPalabra) }}">{{ $item->ruc_entidad }}</a>
                                @else
                                    <a class="btn-preload"
                                        href="{{ url('/detail/consorcio/second/proveedor/' . $item->ruc_entidad . '/' . $rucContratista . '/' . $period . '/contrato' . '/' . $item->ruc_entidad . '/' . $item->nombre_entidad . '/fecha_suscripcion_contrato' . '/' . $nombre) }}">{{ $item->ruc_entidad }}</a>
                                @endif
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Nombre Entidad:</span>
                                {{ $item->nombre_entidad }}
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
            @endif

            <div class="flex justify-center py-8">
                {{ $result->links() }}
            </div>

        </section>
    </main>
@stop
