@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="py-20 px-6 xl:px-10">
            <a href="#" class="flex items-center gap-3 mb-8 xl:mb-16 font-semibold text-sm xl:text-lg text-main-blue">
                <img src="{{ asset('images/icon-chevron-left-blue.png') }}" alt="">

                <span class="btn-preload" onclick="window.location='{{ url('/') }}'">Inicio</span>
                @if ($busquedaPalabra !== null)
                    <span onclick="preloadActive2('funcionario', '<?php echo URL::to('ranking/funcionario/search'); ?>', '<?php echo $period; ?>', '<?php echo $busquedaPalabra; ?>' )">/ Funcionario</span>
                @else
                    <span class="btn-preload" onclick="window.location='{{ url('/ranking/funcionario/' . $period) }}'">/

                        Funcionario</span>
                @endif
              
            </a>
            <h2 class="text-center text-xl xl:text-4xl font-bold mb-6 xl:mb-0">
                {{ $name }}
            </h2>
            <h4 class="text-center  font-bold mb-6 xl:mb-14">
                {{ $labelNivel }}<br class="hidden xl:block">{{ $labelType }}

            </h4>
            @if ($nivel == 'DCPD')
                @if ($type == 'orden-compra')
                    <x-tabla.funcionario.d-c-p-d.orden-compra :items="$data" />
                @elseif ($type == 'contrato')
                    <x-tabla.funcionario.d-c-p-d.contrato :items="$data" />
                @elseif ($type == 'consorcio')
                    <x-tabla.funcionario.d-c-p-d.consorcio :items="$data" />
                @endif
            @elseif($nivel == 'DPRE')
                @if ($type == 'orden-compra')
                    <x-tabla.funcionario.d-p-r-e.orden-compra :items="$data" />
                @elseif ($type == 'contrato')
                    <x-tabla.funcionario.d-p-r-e.contrato :items="$data" />
                @elseif ($type == 'consorcio')
                    <x-tabla.funcionario.d-p-r-e.consorcio :items="$data" />
                @endif
            @elseif($nivel == 'CDAF')
                @if ($type == 'orden-compra')
                    <x-tabla.funcionario.c-d-a-f.orden-compra :items="$data" />
                @elseif ($type == 'contrato')
                    <x-tabla.funcionario.c-d-a-f.contrato :items="$data" />
                @elseif ($type == 'consorcio')
                    <x-tabla.funcionario.c-d-a-f.consorcio :items="$data" />
                @endif
            @elseif($nivel == 'CEDFA')
                @if ($type == 'orden-compra')
                    <x-tabla.funcionario.c-e-d-f-a.orden-compra :items="$data" />
                @elseif ($type == 'contrato')
                    <x-tabla.funcionario.c-e-d-f-a.contrato :items="$data" />
                @elseif ($type == 'consorcio')
                    <x-tabla.funcionario.c-e-d-f-a.consorcio :items="$data" />
                @endif
            @endif



        </section>
    </main>
@stop
