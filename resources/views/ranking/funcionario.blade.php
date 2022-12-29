@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="u-container">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="/images/icon-chevron-left-blue.png" alt="">
                <span>
                    <span onclick="window.location='{{ url('/') }}'">Inicio</span>
                </span>
            </a>
            <h2 class="text-center text-xl xl:text-4xl font-bold mb-14">
                Ranking de funcionarios
                @isset($busquedaPalabra)
                    <br class="hidden xl:block"> Resultado de "{{ $busquedaPalabra }}"
                @endisset
            </h2>

            @isset($search)
                <form method="POST" action="{{ route('funcionario.busqueda', [$period]) }}" class="mb-14">
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
                        Funcionario
                        <img src="../images/icon-chevron-up.png" alt="">
                    </p>
                    <p class="col-span-2 hidden xl:flex items-center gap-2">
                        Monto
                        <img src="../images/icon-chevron-down-blue.png" alt="">
                    </p>
                    <p class="col-span-1 xl:col-span-2 flex items-center gap-2 justify-center">
                        Cantidad
                        <img src="../images/icon-chevron-down-blue.png" alt="">
                    </p>
                </header>
                @foreach ($result as $key => $item)
                    <details
                        class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                        <summary
                            class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                            <p class="col-span-1 order-1 flex items-center gap-6">
                                <span> {{ $result->firstItem() + $key }}</span>
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
                                <li class="grid grid-cols-12">
                                    <p class="font-bold text-xs xl:text-base xl:col-start-2 col-span-6 xl:col-span-4">
                                        {{ $categorias->name }}
                                    </p>
                                </li>
                                @foreach ($categorias->subcategory as $subCategorias)
                                    <li class="grid items-center grid-cols-12 gap-4">
                                        <p
                                            class="flex items-center gap-3 font-medium xl:col-start-2 col-span-6 xl:col-span-4">
                                            {{ $subCategorias->name }}
                                            <a
                                                href="{{ url('/detail/funcionario/' . $item->dataList->idFuncionario . '/' . $categorias->abbreviation . '/' . $subCategorias->abbreviation . '/' . $item->dataList->nombre) }}"><img
                                                    src="/images/icon-compartir.png" alt="Compartir"></a>
                                        </p>
                                        <p class="col-span-4 xl:col-span-4 text-right">{{ $subCategorias->monto }}</p>
                                        <p class="col-span-2 xl:col-span-3 text-right">{{ $subCategorias->cantidad }}</p>
                                    </li>
                                @endforeach
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
