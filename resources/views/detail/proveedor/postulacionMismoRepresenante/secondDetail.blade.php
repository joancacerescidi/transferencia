@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">
                <span onclick="window.location='{{ url('/') }}'">Inicio </span>
                @if ($busquedaPalabra !== null)
                    <span class="btn-preload" onclick="javascript:document.busquedaProveedor.submit()">/ Proveedor</span>
                @else
                    <span class="btn-preload" onclick="window.location='{{ url('/ranking/proveedor/' . $period) }}'">/
                        Proveedor</span>
                @endif

                @if ($busquedaPalabra !== null)
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/postulaciones-con-mismo-representante/first/proveedor/' . $rucContratista . '/' . $period . '/' . $nombre . '/' . $busquedaPalabra) }}'">/
                        1° Detalle</span>
                @else
                    <span class="btn-preload"
                        onclick="window.location='{{ url('/detail/postulaciones-con-mismo-representante/first/proveedor/' . $rucContratista . '/' . $period . '/' . $nombre) }}'">/
                        1° Detalle</span>
                @endif
                @if ($busquedaPalabra !== null)
                    <form onsubmit='return preloadActive()' action="{{ route('proveedor.busqueda', [$period]) }}"
                        method="POST" name="busquedaProveedor" id="busquedaProveedor">
                        @csrf
                        <input type="hidden" name="palabraClave" value="{{ $busquedaPalabra }}">
                    </form>
                @endif
            </a>



            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                POSTULACIÓN MISMO REPRESENTANTE <br> {{ $nombre }}<br> {{ $ruc }} <br>{{ $rucNombre }}
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
                    class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-11 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                    <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                        Número Contrato
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-1 font-semibold flex items-center">
                        fecha suscripción contrato
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                        Descripción proceso
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
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                        Monto Contratado Item
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                    <p class="xl:col-span-4 font-semibold hidden xl:flex items-center gap-2">
                        Representantes de los postores en la misma convocatoria
                        {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
                    </p>
                </header>
                <div
                    class="px-5 py-5 xl:py-0 grid xl:grid-cols-11 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                    @foreach ($result as $item)
                        <p class="xl:col-span-1 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden"> Número Contrato:</span>
                            {{ $item->numero_contrato }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Descipción Item:</span>
                            {{ $item->fecha_suscripcion_contrato }}
                        </p>
                        <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">fecha suscripción contrato:</span>
                            {{ $item->descripcion_proceso }}
                        </p>

                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden"> Url Contrato: </span>
                            <span> <a class="text-[blue]" href="{{ $item->urlcontrato }}" target="_Blank">Url
                                    Contrato</a></span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                            <span> {{ $item->moneda }}</span>
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden"> Monto Contratado Item: </span>
                            <span> {{ $item->monto_contratado_item }}</span>
                        </p>
                        <p class="xl:col-span-4 font-medium grid grid-cols-2 xl:block items-center gap-8">
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
