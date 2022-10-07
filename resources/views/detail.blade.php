@extends('layout.app')
@section('content')
    <section class="u-container">
        <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-14">
            Ministerio de Relaciones Exteriores <br class="hidden xl:block">  Fraccionamiento  <br class="hidden xl:block"> Período : Hasta Setiembre 2022  
        </h2>
        <a href="{{ url('/') }}"
            class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
            <img src="/images/icon-chevron-left-blue.png" alt="">
            Volver
        </a>
        <article
            class="p-5 xl:p-10 bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
            <header class="grid grid-cols-2 xl:grid-cols-10 gap-8 items-center text-xs xl:text-lg mb-6 xl:mb-14">
                <p class="col-span-1 hidden xl:block">
                    <img src="/images/icon-circle.png" class="mx-auto">
                </p>
                <p class="xl:col-span-3 font-semibold">RUC</p>
                <p class="xl:col-span-2 text-main-gray font-medium ">Nombre </p>
                <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">Monto </p>
                <p class="xl:col-span-2 text-main-gray font-medium hidden xl:block">Órdenes de compra/Contratos. </p>
            </header>
            <div
                class="grid grid-cols-2 xl:grid-cols-10 items-start gap-8 text-xs xl:text-lg mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                <p class="col-span-1 hidden xl:block">
                </p>

                <p class="xl:col-span-3 font-semibold"><a href="{{ url('/detalle2') }}">10770552503</a> </p>

                <p class="xl:col-span-2 font-medium">SIFUENTES MEJIA </p>
                  <p class="xl:col-span-2 font-medium">S/ 1529</p>
                <p class="col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden"># de contrataciones: </span>
                    <span>120</span>
                </p>

            </div>
             <div
                class="grid grid-cols-2 xl:grid-cols-10 items-start gap-8 text-xs xl:text-lg mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                <p class="col-span-1 hidden xl:block">
                </p>

                <p class="xl:col-span-3 font-semibold"><a href="{{ url('/detalle2') }}">107702654456</a> </p>

                <p class="xl:col-span-2 font-medium">MARCO ANTONIO</p>
                  <p class="xl:col-span-2 font-medium">S/ 151</p>
                <p class="col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden"># de contrataciones: </span>
                    <span>130</span>
                </p>

            </div>
             <div
                class="grid grid-cols-2 xl:grid-cols-10 items-start gap-8 text-xs xl:text-lg mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                <p class="col-span-1 hidden xl:block">
                </p>

                <p class="xl:col-span-3 font-semibold"><a href="{{ url('/detalle2') }}">1547845236</a> </p>

                <p class="xl:col-span-2 font-medium"> WILBER SIFUENTES</p>
                  <p class="xl:col-span-2 font-medium">S/ 150</p>
                <p class="col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden"># de contrataciones: </span>
                    <span>140</span>
                </p>

            </div>
             <div
                class="grid grid-cols-2 xl:grid-cols-10 items-start gap-8 text-xs xl:text-lg mb-10 border-b pb-4 xl:pb-0 xl:border-0">
                <p class="col-span-1 hidden xl:block">
                </p>

                <p class="xl:col-span-3 font-semibold"><a href="{{ url('/detalle2') }}">10770552503</a> </p>

                <p class="xl:col-span-2 font-medium"> MEJIA WILBER</p>
                  <p class="xl:col-span-2 font-medium">S/ 159</p>
                <p class="col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden"># de contrataciones: </span>
                    <span>110</span>
                </p>

            </div>
           
        </article>
    </section>
@stop
