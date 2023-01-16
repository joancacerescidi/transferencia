@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">

                <span class="btn-preload" onclick="window.location='{{ url('/') }}'">Inicio </span>

            </a>


            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                CONSORCIO <br>
                {{ $nameEntidad }}<br> {{ $ruc }}<br> {{ $nameRuc }}
            </h2>
            <div class="flex flex-wrap font-semibold text-xs xl:text-base gap-4 mb-4">
                <button
                    onclick="window.location='{{ url('/detail/consorcio/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/orden-compra') }}'"
                    class="p-4 bg-white transition-colors shadow-sm rounded-md ring @if ($filter == 'orden-compra') ring-blue-500
                    @else
                        ring-gray-100 @endif   ring-offset-2">Compra</button>
                <button
                    onclick="window.location='{{ url('/detail/consorcio/second/proveedor/' . $rucEntidad . '/' . $rucContratista . '/' . $period . '/contrato') }}'"
                    class="p-4 bg-white transition-colors shadow-sm rounded-md ring @if ($filter == 'contrato') ring-blue-500
                    @else
                        ring-gray-100 @endif ring-offset-2">Contrato</button>
            </div>
            @if ($filter == 'orden-compra')
                <article
                    class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                    <header
                        class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-12 gap-4 items-center text-xs xl:text-sm mb-6 xl:mb-14 xl:overflow-x-auto u-table-row">
                        <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                            Fecha Emisión
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-3 font-semibold flex items-center">
                            Descripcion Orden
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                            Orden
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2 ">
                            Objeto Contractual
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center justify-end gap-2">
                            Moneda
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center justify-end gap-2">
                            Monto Total original
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center justify-end gap-2">
                            Ruc Consorcio
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center justify-end gap-2">
                            Nombre Consorcio
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                    </header>
                    <div
                        class="px-5 py-5 xl:py-0 grid xl:grid-cols-12 items-start gap-4 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0 xl:overflow-x-auto u-table-row">
                        @foreach ($result as $item)
                            <p class="xl:col-span-2 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Fecha Emisión:</span>
                                {{ $item->fecha_emision }}
                            </p>
                            <p class="xl:col-span-3 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Descripcion Orden:</span>
                                {{ $item->descripcion_orden }}
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden"> Orden:</span>
                                {{ $item->orden }}
                            </p>

                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 ">
                                <span class="text-main-gray font-medium xl:hidden">Objeto Contractual: </span>
                                <span> {{ $item->objetocontractual }}</span>
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                                <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                                <span> {{ $item->moneda }}</span>
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                                <span class="text-main-gray font-medium xl:hidden">Monto Contratado: </span>
                                <span> {{ $item->monto_total_original }}</span>
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                                <span class="text-main-gray font-medium xl:hidden">Ruc Consorcio: </span>
                                <span> {{ $item->ruc_consorcio }}</span>
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                                <span class="text-main-gray font-medium xl:hidden"> Nombre Consorcio: </span>
                                <span> {{ $item->nombreconsorcio }}</span>
                            </p>
                        @endforeach
                    </div>
                    <!-- Cuando no hay data -->
                    @if (count($result->items()) == 0)
                        <p class=" text-center text-sm xl:text-base font-semibold">Sin Datos</p>
                    @endif
                </article>
            @elseif($filter == 'contrato')
                <article
                    class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
                    <header
                        class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-12 gap-4 items-center text-xs xl:text-sm mb-6 xl:mb-14 xl:overflow-x-auto u-table-row">
                        <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                            Fecha Suscripcion Contrato
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-3 font-semibold flex items-center">
                            Descripcion Proceso
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                            Num Contrato
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2 ">
                            Url Contrato
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center justify-end gap-2">
                            Moneda
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center justify-end gap-2">
                            Monto Contratado
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center justify-end gap-2">
                            Ruc Consorcio
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                        <p class="xl:col-span-1 font-semibold hidden xl:flex items-center justify-end gap-2">
                            Nombre Consorcio
                            {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                        </p>
                    </header>
                    <div
                        class="px-5 py-5 xl:py-0 grid xl:grid-cols-12 items-start gap-4 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0 xl:overflow-x-auto u-table-row">
                        @foreach ($result as $item)
                            <p class="xl:col-span-2 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Fecha Suscripcion Contrato:</span>
                                {{ $item->fecha_suscripcion_contrato }}
                            </p>
                            <p class="xl:col-span-3 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden">Descripcion Proceso:</span>
                                {{ $item->descripcion_proceso }}
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                <span class="text-main-gray font-medium xl:hidden"> Num Contrato:</span>
                                {{ $item->num_contrato }}
                            </p>

                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 ">
                                <span class="text-main-gray font-medium xl:hidden">Url Contrato: </span>
                                <span> <a class="text-[blue]" href="{{ $item->urlcontrato }}" target="_Blank">Url
                                        Contrato</a></span>
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                                <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                                <span> {{ $item->moneda }}</span>
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                                <span class="text-main-gray font-medium xl:hidden">Monto Contratado: </span>
                                <span> {{ $item->monto_contratado_item }}</span>
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                                <span class="text-main-gray font-medium xl:hidden">Ruc Consorcio: </span>
                                <span> {{ $item->ruc_consorcio }}</span>
                            </p>
                            <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                                <span class="text-main-gray font-medium xl:hidden"> Nombre Consorcio: </span>
                                <span> {{ $item->nombreconsorcio }}</span>
                            </p>
                        @endforeach
                    </div>
                    <!-- Cuando no hay data -->
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
