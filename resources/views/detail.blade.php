@extends('layout.app')
@section('content')
    <section class="u-container">
        <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
            Ministerio de Relaciones Exteriores <br class="hidden xl:block"> {{ $title }} <br class="hidden xl:block">
            Período : Hasta Setiembre 2022
        </h2>
        <a href="{{ url('/') }}"
            class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
            <img src="/images/icon-chevron-left-blue.png" alt="">
            Volver
        </a>
        <article
            class="p-5 xl:p-10 bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
            <header class="grid grid-cols-2 xl:grid-cols-9 gap-8 items-center text-xs xl:text-lg mb-6 xl:mb-14">
                <p class="col-span-1 hidden xl:block">
                    <img src="/images/icon-circle.png" class="mx-auto">
                </p>
                <p class="xl:col-span-2  font-semibold  hidden xl:block">RUC</p>
                <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">Nombre </p>
                <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">Monto </p>
                <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">Órdenes de compra/Contratos. </p>
            </header>
            @foreach ($dataDetalle1 as $data)
                <div
                    class="grid xl:grid-cols-9 items-start gap-8 text-xs xl:text-lg mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                    <p class="col-span-1 hidden xl:block">
                    </p>
                    <p class="xl:col-span-2 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">RUC:</span>
                        <a href="{{ url('/detalle2/' . $data->ruc_entidad . '/' . $data->ruc_contratista .'/'.$type) }}">
                        {{ $data->ruc_contratista }}</a>
                    </p>
                    <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Nombre:</span>
                        {{ $data->nombre_contratista }}
                    </p>
                    <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Monto:</span>
                        S/ {{ $data->monto }}
                    </p>
                    <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Órdenes de compra/Contratos : </span>
                        <span> {{ $data->cantidad }}</span>
                    </p>
                </div>
            @endforeach

        </article>
    </section>
@stop
