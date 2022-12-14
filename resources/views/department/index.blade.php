@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="u-container">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">
                Volver / Pagina 1 / Pagina 2
            </a>
            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
                {{ $department }}
            </h2>
            <article
                class="p-5 xl:p-10 bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <header
                    class="hidden xl:grid grid-cols-2 xl:grid-cols-12 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                    <p class="col-span-1 hidden xl:block">
                        <img src="{{ asset('images/icon-circle.png') }}" class="mx-auto">
                    </p>
                    <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                        Fecha de emisión
                        <img src="{{ asset('images/icon-chevron-up.png') }}" alt="">
                    </p>
                    <p class="xl:col-span-1 font-semibold flex items-center">
                        # orden
                        <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="">
                    </p>
                    <p class="xl:col-span-5 font-semibold flex items-center gap-2">
                        Descripción
                        <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="">
                    </p>
                    <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2 xl:text-right">
                        Monto
                        <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="">
                    </p>
                    <p class="xl:col-span-2 font-semibold hidden xl:flex items-center gap-2">
                        Comentarios
                        <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="">
                    </p>
                </header>
                <div
                    class="grid xl:grid-cols-12 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                    <p class="col-span-1 hidden xl:block"></p>
                    <p class="xl:col-span-2 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Fecha de emisión:</span>
                        12/12/1999
                    </p>
                    <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden"># de orden/contrato:</span>
                        150
                    </p>
                    <p class="xl:col-span-5 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Descripción:</span>
                        SERVICIO DE UN ASESOR MEDICO CIRUJANO, SOLICITADO POR EL DEPARTAMENTO DE CIRUJIA DE ESTE HOSPI
                        CONTRATO
                        IAFAS N°018-2021 CORRESPONDIENTE AL MES DE ENERO-2022
                    </p>
                    <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                        <span class="text-main-gray font-medium xl:hidden">Monto: </span>
                        <span>120</span>
                    </p>
                    <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Comentarios: </span>
                        <span>Comentarios</span>
                    </p>
                </div>
            </article>
            <div class="flex justify-center py-8">
                <button class="p-4">
                    <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">
                </button>
                <button
                    class="p-4 bg-white font-semibold border hover:border-main-blue transition-colors shadow-sm border-main-blue">1</button>
                <button
                    class="p-4 bg-white font-semibold border hover:border-main-blue transition-colors shadow-sm">2</button>
                <button
                    class="p-4 bg-white font-semibold border hover:border-main-blue transition-colors shadow-sm">3</button>
                <button
                    class="p-4 bg-white font-semibold border hover:border-main-blue transition-colors shadow-sm">4</button>
                <button class="p-4">
                    <img src="{{ asset('images/icon-chevron-right-blue.png') }}" alt="">
                </button>
            </div>
        </section>
    </main>
@endsection
