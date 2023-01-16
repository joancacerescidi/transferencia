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
                Ranking de entidades
                @isset($busquedaPalabra)
                    <br class="hidden xl:block"> Resultado de "{{ $busquedaPalabra }}"
                @endisset
            </h2>

            @isset($search)
                <form onsubmit='return preloadActiveEntidad()' method="POST"
                    action="{{ route('entidad.busqueda', [$period, 'monto']) }}" class="mb-14">
                    @csrf
                    <div class="relative xl:w-1/3 mx-auto mb-14">
                        <input name="palabraClave" value="<?= $busquedaPalabra ?>"
                            class="block w-full py-5 px-6 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring focus:ring-main-blue"
                            type="text" placeholder="Buscar entidad del estado">
                        <button type="submit" class="absolute top-5 right-5">
                            <img src="/images/icon-buscar.png" alt="Buscar">
                        </button>
                    </div>
                </form>
            @endisset
            <article>
                <header class="grid grid-cols-6 xl:grid-cols-12 mb-8 font-semibold text-sm xl:text-lg">
                    <p class="col-span-1 pl-6 xl:pl-10">#</p>
                    <p class="col-span-4 xl:col-span-7 pl-4 xl:pl-10 flex items-center gap-2">
                        Entidad
                        {{-- <img src="/images/icon-chevron-up.png" alt=""> --}}
                    </p>
                    <a href="{{ url('/ranking/entidad/' . $period . '/monto') }}"
                        class="btn-preload col-span-2 hidden xl:flex items-center gap-2 cursor-pointer">
                        Monto Contratado
                        @if ($order == 'monto')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                        @endif

                    </a>
                    <a href="{{ url('/ranking/entidad/' . $period . '/ranking') }}"
                        class="btn-preload col-span-1 xl:col-span-2 flex items-center gap-2 justify-center cursor-pointer">
                        Ranking
                        @if ($order == 'ranking')
                            <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                        @else
                            <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
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
                            @switch($item->dataList->ranking)
                                @case($item->dataList->ranking < 0.5)
                                    <p
                                        class="col-span-6 xl:col-span-3 text-[#ff0000] flex items-center xl:justify-end gap-2 order-3 xl:order-4 col-start-2 xl:col-start-auto">
                                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ranking:</span>
                                        <span class="flex items-center justify-center gap-1 mr-2">
                                            <span class="h-3 w-3 rounded-full block bg-gray-300"></span>
                                            <span class="h-3 w-3 rounded-full block bg-gray-300"></span>
                                            <span class="h-3 w-3 rounded-full block bg-red-500"></span>
                                        </span>
                                        {{ $item->dataList->ranking }}
                                    </p>
                                @break

                                @case($item->dataList->ranking < 0.5 && $item->dataList->ranking > 0.2)
                                    <p
                                        class="col-span-6 xl:col-span-3 text-yellow-300 flex items-center xl:justify-end gap-2 order-3 xl:order-4 col-start-2 xl:col-start-auto">
                                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ranking:</span>
                                        <span class="flex items-center justify-center gap-1 mr-2">
                                            <span class="h-3 w-3 rounded-full block bg-gray-300"></span>
                                            <span class="h-3 w-3 rounded-full block bg-yellow-300"></span>
                                            <span class="h-3 w-3 rounded-full block bg-gray-300"></span>
                                        </span>
                                        {{ $item->dataList->ranking }}
                                    </p>
                                @break

                                @case($item->dataList->ranking > 0.2)
                                    <p
                                        class="col-span-6 xl:col-span-3 text-[#3cb371] flex items-center xl:justify-end gap-2 order-3 xl:order-4 col-start-2 xl:col-start-auto">
                                        <span class="text-gray-400 xl:hidden pr-8 font-medium">Ranking:</span>
                                        <span class="flex items-center justify-center gap-1 mr-2">
                                            <span class="h-3 w-3 rounded-full block bg-green-500"></span>
                                            <span class="h-3 w-3 rounded-full block bg-gray-300"></span>
                                            <span class="h-3 w-3 rounded-full block bg-gray-300"></span>
                                        </span>
                                        {{ $item->dataList->ranking }}
                                    </p>
                                @break
                            @endswitch



                        </summary>


                        <ul class="p-6 xl:p-10 xl:pt-5 grid gap-4 xl:gap-8 text-xs xl:text-base">
                            <li class="grid items-center grid-cols-12 gap-4">
                                <p
                                    class="col-start-8 xl:col-start-9 col-span-3 xl:col-span-1 text-right font-bold text-xs xl:text-sm">
                                    Monto</p>
                                <p
                                    class="col-start-11 xl:col-start-12 col-span-2 xl:col-span-1 text-right font-bold text-xs xl:text-sm">
                                    Cantidad</p>
                            </li>

                            @foreach ($item->dataList->categorys as $categorias)
                                <li class="grid items-center grid-cols-12 gap-4">
                                    <p class="flex items-center gap-3 font-medium xl:col-start-2 col-span-6 xl:col-span-4">
                                        {{ $categorias->name }}
                                        @if ($categorias->sigla == 'FRA')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/fraccionamiento/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/fraccionamiento/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'CRC')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/crc/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/crc/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'PRC')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/prc/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/prc/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'ADI')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/adi/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/adi/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @elseif($categorias->sigla == 'PMR')
                                            @if (isset($busquedaPalabra))
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/pmr/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $busquedaPalabra) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @else
                                                <a class="btn-preload"
                                                    href="{{ url('/detail/first/pmr/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre) }}"><img
                                                        src="/images/icon-compartir.png" alt="Compartir"></a>
                                            @endif
                                        @endif
                                    </p>
                                    <p class="col-span-4 xl:col-span-4 text-right">{{ $categorias->monto }}</p>
                                    <p class="col-span-2 xl:col-span-3 text-right">{{ $categorias->cantidad }}</p>
                                </li>
                            @endforeach
                        </ul>

                        <hr class="m-6">
                        <h2 class="text-center text-sm xl:text-base font-bold mb-6">
                            Gráfico Entidad
                        </h2>
                        <div class="xl:w-6/12 mx-auto mb-8">
                            <canvas id="myChartEntidad{{ $key }}"></canvas>
                        </div>
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
        var dataEntidad = {!! json_encode($result->items()) !!};
        dataEntidad.forEach((value, index) => {

            var canvaItem = `myChartEntidad${index}`.toString();
            const ctx = document.getElementById(canvaItem);
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: value.grafico.label,
                    datasets: [{
                        data: value.grafico.dataset1,
                        label: "Ranking",
                        borderColor: "#3e95cd",
                        fill: false
                    }, {
                        data: value.grafico.dataset2,
                        label: "Monto de Compra",
                        borderColor: "#8e5ea2",
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                },
            });


        });
    </script>
@endsection
