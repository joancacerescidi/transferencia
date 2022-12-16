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
                        Nota
                        <img src="../images/icon-chevron-down-blue.png" alt="">
                    </p>
                </header>
                @foreach ($result as $item)
                    <details
                        class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                        <summary
                            class="p-6 xl:p-10 grid grid-cols-6 xl:grid-cols-12 items-center gap-4 text-sm xl:text-lg font-bold">
                            <p class="col-span-1 order-1">1</p>
                            <img class="col-span-1 hidden xl:block xl:order-2"
                                src="/images/icon-ministerio-relaciones-exteriores.png"
                                alt="Ministerio de relaciones exteriores">
                            <p class="col-span-4 xl:col-span-4 order-2 xl:order-3 line-clamp-2">
                                {{ $item->nombre }}
                            </p>
                            <p
                                class="col-span-6 xl:col-span-3 text-main-red order-4 xl:order-3 text-xs xl:text-lg xl:text-right col-start-2 xl:xol-start-auto">
                                <span class="text-gray-400 xl:hidden pr-8 font-medium">En riesgo:</span>
                                <span>S/ 892899.41 mill.</span>
                            </p>
                            <p
                                class="col-span-6 xl:col-span-3 text-main-red flex items-center xl:justify-end gap-2 order-3 xl:order-4 col-start-2 xl:col-start-auto">
                                <span class="text-gray-400 xl:hidden pr-8 font-medium">Nota:</span>
                                <img src="/images/icon-estrella.png" class="mb-1">
                                24545592.53
                            </p>
                            <!-- <p class="text-right xl:text-left col-span-6 xl:col-span-1 order-5">
                                              <span class="text-gray-400 xl:hidden pr-8 font-medium">Ver más</span>
                                              <img src="/images/icon-chevron-down.png" class="inline">
                                            </p> -->
                        </summary>
                        @foreach ($item->category as $categorias)
                            <ul class="p-6 xl:p-10 xl:pt-5 grid gap-4 xl:gap-8 text-xs xl:text-base">
                                <li class="grid items-center grid-cols-12 gap-4">
                                    <p class="flex items-center gap-3 font-medium xl:col-start-3 col-span-6 xl:col-span-4">
                                        {{ $categorias->name }}
                                        <a href="#"><img src="/images/icon-compartir.png" alt="Compartir"></a>
                                    </p>
                                    <p class="col-span-4 xl:col-span-3 text-right">  {{ $categorias->riesgo }}</p>
                                    <p class="col-span-2 xl:col-span-3 text-right">  {{ $categorias->nota }}</p>
                                </li>
                            </ul>
                        @endforeach
                        {{-- <hr class="m-6">
                    <h2 class="text-center text-sm xl:text-base font-bold mb-6">
                        Lorem ipsum dolor sit amet.
                    </h2>
                    <img src="../images/grafico-example.jpg" class="mb-8 mx-auto"> --}}
                    </details>
                @endforeach
                <div class="flex justify-center py-8">
                    {{ $data->links() }}
                </div>
            </article>
        </section>
    </main>
@endsection
