@extends('layout.app')
@section('content')
    <section class="u-container">
        <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
            Ministerio de Relaciones Exteriores <br class="hidden xl:block"> Ministerio - Período : Hasta Setiembre 2022 <br
                class="hidden xl:block"> 107702654456 - Marco Antonio
        </h2>
        <a href="{{ url('/detalle') }}"
            class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
            <img src="/images/icon-chevron-left-blue.png" alt="">
            Volver
        </a>
        <article
            class="p-5 xl:p-10 bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
            <header class="grid grid-cols-2 xl:grid-cols-12 gap-8 items-center text-xs xl:text-lg mb-6 xl:mb-14">
                <p class="col-span-1 hidden xl:block">
                    <img src="/images/icon-circle.png" class="mx-auto">
                </p>
                <p class="xl:col-span-3 font-semibold">Fecha de emisión/suscripción</p>
                <p class="xl:col-span-2 text-main-gray font-medium "># de orden/contrato</p>
                <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">descripción </p>
                <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">monto </p>
                <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">comentarios </p>
            </header>
            <div
                class="grid grid-cols-2 xl:grid-cols-12 items-start gap-8 text-xs xl:text-lg mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                <p class="col-span-1 hidden xl:block">
                </p>
                <p class="xl:col-span-3 font-semibold">12/12/1999</p>
                <p class="xl:col-span-2 font-medium">156</p>
                <p class="col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden"># de contrataciones: </span>
                    <span>descripción</span>
                </p>
                <p class="xl:col-span-2 font-medium">156</p>
                <p class="xl:col-span-2 font-medium">comentario</p>
            </div>
             <div
                class="grid grid-cols-2 xl:grid-cols-12 items-start gap-8 text-xs xl:text-lg mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                <p class="col-span-1 hidden xl:block">
                </p>
                <p class="xl:col-span-3 font-semibold">12/12/1999</p>
                <p class="xl:col-span-2 font-medium">156</p>
                <p class="col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden"># de contrataciones: </span>
                    <span>descripción</span>
                </p>
                <p class="xl:col-span-2 font-medium">156</p>
                <p class="xl:col-span-2 font-medium">comentario</p>
            </div>
             <div
                class="grid grid-cols-2 xl:grid-cols-12 items-start gap-8 text-xs xl:text-lg mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                <p class="col-span-1 hidden xl:block">
                </p>
                <p class="xl:col-span-3 font-semibold">12/12/1999</p>
                <p class="xl:col-span-2 font-medium">156</p>
                <p class="col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden"># de contrataciones: </span>
                    <span>descripción</span>
                </p>
                <p class="xl:col-span-2 font-medium">156</p>
                <p class="xl:col-span-2 font-medium">comentario</p>
            </div>
        </article>
    </section>
@stop
