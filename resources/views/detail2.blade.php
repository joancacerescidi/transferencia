@extends('layout.app')
@section('content')
    <section class="u-container">
        <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
            {{ $entidad }} <br class="hidden xl:block"> {{ $title }} <br class="hidden xl:block">
            Período : Hasta Setiembre 2022 <br class="hidden xl:block">
            {{ $contratista }}
        </h2>
        <a href="{{ url('/') }}"
            class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
            <img src="/images/icon-chevron-left-blue.png" alt="">
            Volver
        </a>


        {{-- Contratos --}}
        @if (($object1->type == 1 || $object1->type == 4) && count($object1->dataContrato) !== 0)
            <article
                class="p-5 xl:p-10 bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">

                <header
                    class="hidden xl:grid grid-cols-2 xl:grid-cols-12 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                    <p class="col-span-1 hidden xl:block">
                        <img src="/images/icon-circle.png" class="mx-auto">
                    </p>
                    <p class="xl:col-span-2 text-main-gray font-medium">Fecha de emisión/suscripción</p>
                    <p class="xl:col-span-1 text-main-gray font-medium "># de contrato</p>
                    <p class="xl:col-span-5 text-main-gray font-medium ">Descripción</p>
                    <p class="xl:col-span-1 text-main-gray font-medium hidden xl:block xl:text-right">Monto</p>
                    <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">Comentarios</p>
                </header>

                <div
                    class="grid xl:grid-cols-12 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">

                    <p class="col-span-1 hidden xl:block"></p>


                    <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Fecha de emisión:</span>
                        {{ $data->fecha_date }}
                    </p>

                    <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden"># de contrato:</span>
                        {{ $data->nro_orden }}
                    </p>

                    <p class="xl:col-span-5 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Descripción:</span>
                        {{ $data->descripcion }}
                    </p>
                    <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                        <span class="text-main-gray font-medium xl:hidden">Monto: </span>
                        <span> {{ $data->monto }}</span>
                    </p>
                    <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                        <span class="text-main-gray font-medium xl:hidden">Comentarios: </span>
                        <span>sin comentarios</span>
                    </p>
                </div>

            </article>
        @endif
        {{-- Compra --}}
        @if (($object1->type == 1 || $object1->type == 3) && count($object1->dataCompra) !== 0)
            <article
                class="p-5 xl:p-10 bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
                <header
                    class="hidden xl:grid grid-cols-2 xl:grid-cols-12 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                    <p class="col-span-1 hidden xl:block">
                        <img src="/images/icon-circle.png" class="mx-auto">
                    </p>
                    <p class="xl:col-span-2 text-main-gray font-medium">fecha de emisión</p>
                    <p class="xl:col-span-1 text-main-gray font-medium "># de orden</p>
                    <p class="xl:col-span-5 text-main-gray font-medium ">Descripción</p>
                    <p class="xl:col-span-1 text-main-gray font-medium hidden xl:block xl:text-right">Monto</p>
                    <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">Comentarios</p>


                </header>
                <div
                    class="grid xl:grid-cols-12 items-start gap-8 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">

                    @foreach ($object1->dataCompra as $data)
                        <p class="col-span-1 hidden xl:block"></p>
                        <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Fecha de emisión:</span>
                            {{ $data->fecha_emision }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden"># de orden:</span>
                            {{ $data->nro_de_orden }}
                        </p>
                        <p class="xl:col-span-5 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Descripción:</span>
                            {{ $data->descripcion_orden }}
                        </p>
                        <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 xl:text-right">
                            <span class="text-main-gray font-medium xl:hidden">Monto: </span>
                            <span> {{ $data->monto_total_original }}</span>
                        </p>
                        <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                            <span class="text-main-gray font-medium xl:hidden">Comentarios: </span>
                            <span>sin comentarios</span>
                        </p>
                    @endforeach
                </div>

            </article>
        @endif
    </section>
@stop
