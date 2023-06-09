@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="u-container">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="/images/icon-chevron-left-blue.png" alt="">
                <span>
                    <span class="btn-preload" onclick="window.location='{{ url('/') }}'">Inicio</span>
                </span>
            </a>
            <h2 class="text-center text-xl xl:text-4xl font-bold mb-14">
                Ranking de proveedores
                @isset($busquedaPalabra)
                    <br class="hidden xl:block"> Resultado de "{{ $busquedaPalabra }}"
                @endisset
            </h2>

            @isset($search)
                <div class="mb-14">

                    <div class="relative xl:w-1/3 mx-auto mb-14">
                        <input name="palabraClave" id="palabraProveedor" value="<?= $busquedaPalabra ?>"
                            class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                            type="text" placeholder="Buscar entidad del estado">
                        <button onclick="preloadActive('proveedor',  '<?php echo URL::to('ranking/proveedor/search'); ?>'  ,{{ $period }} )"
                            class="absolute top-5 right-5">
                            <img src="/images/icon-buscar.png" alt="Buscar">
                        </button>
                    </div>
                </div>
            @endisset
            <article>
                <header class="grid grid-cols-6 xl:grid-cols-12 mb-8 font-semibold text-sm xl:text-lg">
                    <p class="col-span-1 pl-6 xl:pl-10">#</p>
                    <p class="col-span-4 xl:col-span-7 pl-4 xl:pl-10 flex items-center gap-2">
                        Proveedor
                        <img src="../images/icon-chevron-up.png" alt="">
                    </p>
                    <a href=" @if (isset($busquedaPalabra)) {{ url('/ranking/proveedor/search/' . $period . '/' . $busquedaPalabra . '/monto') }}
                    @else
                     {{ url('/ranking/proveedor/' . $period . '/monto') }} @endif "
                        class="btn-preload col-span-2 hidden xl:flex items-center gap-2">
                        Monto
                        @if ($orderTable == 'monto')
                            <img src="{{ asset('images/flecha-2.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/flecha-1.png') }}" alt="w-max">
                        @endif
                        <img src="../images/icon-chevron-down-blue.png" alt="">
                    </a>
                    <a href=" @if (isset($busquedaPalabra)) {{ url('/ranking/proveedor/search/' . $period . '/' . $busquedaPalabra . '/cantidad') }}
                    @else
                     {{ url('/ranking/proveedor/' . $period . '/cantidad') }} @endif "
                        class="btn-preload col-span-1 xl:col-span-2 flex items-center gap-2 justify-center">
                        Cantidad @if ($orderTable == 'cantidad')
                            <img src="{{ asset('images/flecha-2.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/flecha-1.png') }}" alt="w-max">
                        @endif
                    </a>
                </header>
                @foreach ($result as $key => $item)
                    <details
                        class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                        <summary
                            class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                            <p class="col-span-1 order-1 flex items-center gap-6">
                                <span>{{ $result->firstItem() + $key }}</span>
                                <img class="hidden xl:block" src="/images/icon-ministerio-relaciones-exteriores.png"
                                    alt="Ministerio de relaciones exteriores">
                            </p>
                            <p class="col-span-6 xl:col-span-5 order-2 xl:order-3 line-clamp-2">
                                {{ $item->dataList->nombre }}
                            </p>
                            <p
                                class="col-span-6 xl:col-span-3 text-main-red order-4 xl:order-3 text-xs xl:text-lg xl:text-right col-start-2 xl:xol-start-auto">
                                <span class="text-gray-400 xl:hidden pr-8 font-medium">Monto:</span>
                                <span> {{ $item->dataList->montoTotal }}</span>
                            </p>
                            <p
                                class="col-span-6 xl:col-span-3 text-main-red flex items-center xl:justify-end gap-2 order-3 xl:order-4 col-start-2 xl:col-start-auto">
                                <span class="text-gray-400 xl:hidden pr-8 font-medium">Cantidad:</span>

                                {{ $item->dataList->cantidadTotal }}
                            </p>
                            <!-- <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                                                                                                                                                                                                                                              <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                                                                                                                                                                                                                                              <img src="/images/icon-chevron-down.png" class="inline">
                                                                                                                                                                                                                                            </p> -->
                        </summary>


                        <ul class="p-6 xl:p-10 xl:pt-5 grid gap-4 xl:gap-8 text-xs xl:text-base">

                            @foreach ($item->dataList->categorys as $categorias)
                                <li class="grid items-center grid-cols-12 gap-4">
                                    <p class="flex items-center gap-3 font-medium xl:col-start-2 col-span-6 xl:col-span-4">
                                        {{ $categorias->name }}
                                        @if ($categorias->sigla == 'orden_compra')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/orden-compra/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/monto' . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/orden-compra/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/monto' . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'contrato')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/contrato/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/monto' . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/contrato/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/monto' . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'consorcio')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/consorcio/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/contrato' . '/monto' . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/consorcio/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/contrato' . '/monto' . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'sanciones')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/sanciones/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/monto' . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/sanciones/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/monto' . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'contrato_resuelto')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/contrato-resuelto/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/monto' . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/contrato-resuelto/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/monto' . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'postulaciones')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/postulaciones/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/cantidad' . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/postulaciones/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/cantidad' . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'postulaciones_representante')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/postulaciones-con-mismo-representante/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/cantidad' . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/postulaciones-con-mismo-representante/first/proveedor/' . $item->dataList->contratista . '/' . $period . '/cantidad' . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @endif

                                    </p>
                                    <p class="col-span-4 xl:col-span-4 text-right">{{ $categorias->monto }}</p>
                                    <p class="col-span-2 xl:col-span-3 text-right">{{ $categorias->cantidad }}</p>
                                </li>
                            @endforeach
                        </ul>


                    </details>
                @endforeach
                <div class="flex justify-center py-8">
                    {{ $result->links() }}
                </div>
            </article>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        function preloadActiveProveedor() {
            let preloader = document.getElementById('preloader');
            preloader.classList.remove('opacity-0', 'pointer-events-none');
        }
    </script>
@endsection
