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
                {{ $department }}
            </h2>

            <article>
                <header class="grid grid-cols-6 xl:grid-cols-12 mb-8 font-semibold text-sm xl:text-lg">
                    <p class="col-span-1 pl-6 xl:pl-10">#</p>
                    <p class="col-span-4 xl:col-span-7 pl-4 xl:pl-10 flex items-center gap-2">
                        Departamento
                        <img src="../images/icon-chevron-up.png" alt="">
                    </p>
                    <p class="col-span-2 hidden xl:flex items-center gap-2">
                        Monto
                        <img src="../images/icon-chevron-down-blue.png" alt="">
                    </p>
                    <p class="col-span-1 xl:col-span-2 flex items-center gap-2 justify-center">
                        Ranking
                        <img src="../images/icon-chevron-down-blue.png" alt="">
                    </p>
                </header>
                @foreach ($resultDepartmentDetail as $key => $item)
                    <details
                        class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                        <summary
                            class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                            <p class="col-span-1 order-1 flex items-center gap-6">
                                <span>{{ $resultDepartmentDetail->firstItem() + $key }}</span>
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
                                            <a class="btn-preload"
                                                href="{{ url('/detail/first/fraccionamiento/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $ruta . '/' . $department . '/monto') }}"><img
                                                    src="/images/icon-compartir.png" alt="Compartir"></a>
                                        @elseif($categorias->sigla == 'CRC')
                                            <a
                                                href="{{ url('/detail/first/crc/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $ruta . '/' . $department . '/monto') }}"><img
                                                    src="/images/icon-compartir.png" alt="Compartir"></a>
                                        @elseif($categorias->sigla == 'PRC')
                                            <a
                                                href="{{ url('/detail/first/prc/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $ruta . '/' . $department . '/monto') }}"><img
                                                    src="/images/icon-compartir.png" alt="Compartir"></a>
                                        @elseif($categorias->sigla == 'ADI')
                                            <a
                                                href="{{ url('/detail/first/adi/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $ruta . '/' . $department . '/monto') }}"><img
                                                    src="/images/icon-compartir.png" alt="Compartir"></a>
                                        @elseif($categorias->sigla == 'PMR')
                                            <a
                                                href="{{ url('/detail/first/pmr/' . $item->dataList->rucEntidad . '/' . $period . '/' . $item->dataList->nombre . '/' . $ruta . '/' . $department . '/monto') }}"><img
                                                    src="/images/icon-compartir.png" alt="Compartir"></a>
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
                    {{ $resultDepartmentDetail->links() }}
                </div>
            </article>
        </section>
    </main>
@endsection
