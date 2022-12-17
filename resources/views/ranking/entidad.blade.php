@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="u-container">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="/images/icon-chevron-left-blue.png" alt="">
                <span>
                    <span>Volver</span> /
                    <span>Pagina 1</span> /
                    <span>Pagina 2</span>
                </span>
            </a>
            <h2 class="text-center text-xl xl:text-4xl font-bold mb-14">
                Ranking de entidades
            </h2>

            @isset($search)
                <form method="POST" action="{{ route('entidad.busqueda', [$period]) }}" class="mb-14">
                    @csrf
                    <div class="relative xl:w-1/3 mx-auto mb-14">
                        <input name="palabraClave"
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
                        Nombre
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
                @foreach ($result as $key => $item)
                    <details
                        class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                        <summary
                            class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                            <p class="col-span-1 order-1 flex items-center gap-6">
                                <span>1</span>
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
                                <span class="text-gray-400 xl:hidden pr-8 font-medium">Ranking:</span>
                                <img src="/images/icon-estrella.png" class="mb-1">
                                {{ $item->dataList->ranking }}
                            </p>
                            <!-- <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                                                                                                                  <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                                                                                                                  <img src="/images/icon-chevron-down.png" class="inline">
                                                                                                                </p> -->
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
                                        <a href="#"><img src="/images/icon-compartir.png" alt="Compartir"></a>
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
                        <canvas id="myChartEntidad{{ $key }}"></canvas>

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
                labels: [2018, 2019, 2020, 2021, 2022],
                datasets: [{
                    data: [134015070652.4031, 95566556.88000001, 1576353333.51, 80193151.79199998,
                        82289637.38
                    ],
                    label: "Ranking",
                    borderColor: "#3e95cd",
                    fill: false
                }, {
                    data: [113610651402.67422, 174887419.29000002, 1681222073.2826984, 159283657.3720001,
                        176669002.86
                    ],
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
