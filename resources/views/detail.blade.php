@extends('layout.app')
@section('content')
    <section class="u-container">
        <h2 class="text-center text-4xl font-bold mb-14">
            Ministerio de Relaciones Exteriores
        </h2>
        <a href="{{ url('/') }}" class="flex items-center gap-3 mb-16 font-semibold text-lg text-main-blue">
            <img src="/images/icon-chevron-left-blue.png" alt="">
            Volver
        </a>
        <article class="p-10 bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
            <header class="grid grid-cols-8 gap-8 items-center text-lg mb-14">
                <p class="col-span-1">
                    <img src="/images/icon-circle.png" class="mx-auto">
                </p>
                <p class="col-span-3 font-semibold">Direccionamiento</p>
                <p class="col-span-2 text-main-gray font-medium">RUC</p>
                <p class="col-span-2 text-main-gray font-medium"># de contrataciones</p>
            </header>
            <div class="grid grid-cols-8 items-start gap-8 text-lg mb-10">
                <p class="col-span-1">
                </p>
                <p class="col-span-3 font-semibold">TORRES CERAS YENNIFER SULLY</p>
                <p class="col-span-2 font-medium">10770552503</p>
                <p class="col-span-2 font-medium">120</p>
            </div>
            <div class="grid grid-cols-8 items-start gap-8 text-lg mb-10">
                <p class="col-span-1">
                </p>
                <p class="col-span-3 font-semibold">SIFUENTES MEJIA WILBER</p>
                <p class="col-span-2 font-medium">10448892897</p>
                <p class="col-span-2 font-medium">100</p>
            </div>
            <div class="grid grid-cols-8 items-start gap-8 text-lg mb-10">
                <p class="col-span-1">
                </p>
                <p class="col-span-3 font-semibold">ORDOÑEZ PEREZ GINO GABRIEL</p>
                <p class="col-span-2 font-medium">10431396543</p>
                <p class="col-span-2 font-medium">96</p>
            </div>
            <div class="grid grid-cols-8 items-start gap-8 text-lg mb-10">
                <p class="col-span-1">
                </p>
                <p class="col-span-3 font-semibold">CANCHAN RAMIREZ ANTONIO GUINER</p>
                <p class="col-span-2 font-medium">10410863419</p>
                <p class="col-span-2 font-medium">92</p>
            </div>
            <div class="grid grid-cols-8 items-start gap-8 text-lg mb-10">
                <p class="col-span-1">
                </p>
                <p class="col-span-3 font-semibold">ORIENTE MADERERO E.I.R.L.</p>
                <p class="col-span-2 font-medium">20609942372</p>
                <p class="col-span-2 font-medium">80</p>
            </div>
            <div class="grid grid-cols-8 items-start gap-8 text-lg mb-10">
                <p class="col-span-1">
                </p>
                <p class="col-span-3 font-semibold">CUBILLOS LOYOLA MORENA MARIA DE FATIMA</p>
                <p class="col-span-2 font-medium">10705518594</p>
                <p class="col-span-2 font-medium">72</p>
            </div>
            <div class="grid grid-cols-8 items-start gap-8 text-lg mb-10">
                <p class="col-span-1">
                </p>
                <p class="col-span-3 font-semibold">CABSAH E.I.R.L.</p>
                <p class="col-span-2 font-medium">20609926181</p>
                <p class="col-span-2 font-medium">40</p>
            </div>
        </article>
    </section>
@stop
