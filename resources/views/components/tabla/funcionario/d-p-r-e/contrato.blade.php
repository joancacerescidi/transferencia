<div>
    <article
        class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
        <header
            class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-15 gap-4 items-center text-xs xl:text-sm mb-6 xl:mb-14 xl:overflow-x-auto u-table-row">
            <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                Cargo
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold flex items-center">
                Entidad
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                Descripción
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/funcionario/' . $idFuncionario . '/' . $nivel . '/' . $type . '/' . $name . '/' . $period . '/oc.fecha_suscripcion_contrato' . '/0' . '/' . $busquedaPalabra) }}
                    @else
                       {{ url('/detail/funcionario/' . $idFuncionario . '/' . $nivel . '/' . $type . '/' . $name . '/' . $period . '/oc.fecha_suscripcion_contrato') }} @endif "
                class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2 ">
                Fecha
                @if ($orderTable == 'oc.fecha_suscripcion_contrato')
                    <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                @else
                    <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                @endif
            </a>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                nrodoc
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Pariente
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Parentesco
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Tipo Conf Juridica
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Ruc Contratista
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Nombre Contratista
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Num Contrato
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Contrato
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Moneda
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <a href=" @if ($busquedaPalabra !== null) {{ url('/detail/funcionario/' . $idFuncionario . '/' . $nivel . '/' . $type . '/' . $name . '/' . $period . '/oc.monto_contratado_item' . '/0' . '/' . $busquedaPalabra) }}
                    @else
                       {{ url('/detail/funcionario/' . $idFuncionario . '/' . $nivel . '/' . $type . '/' . $name . '/' . $period . '/oc.monto_contratado_item') }} @endif "
                class="btn-preload xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Total
                @if ($orderTable == 'oc.monto_contratado_item')
                    <img src="{{ asset('images/icon-chevron-up.png') }}" alt="w-max">
                @else
                    <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max">
                @endif
            </a>
        </header>
        <div
            class="px-5 py-5 xl:py-0 grid xl:grid-cols-15 items-start gap-4 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0 xl:overflow-x-auto u-table-row">
            @foreach ($collection as $key => $item)
                <p class="xl:col-span-1 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Cargo:</span>
                    {{ $item->cargo }}
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Entidad:</span>
                    {{ $item->nombreentidad }}
                </p>
                <p class="xl:col-span-2 font-medium grid grid-cols-2 xl:block items-center gap-8 text-xs">
                    <span class="text-main-gray font-medium xl:hidden">Descripción:</span>
                    {{ $item->descripcion_proceso }}
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 ">
                    <span class="text-main-gray font-medium xl:hidden">Fecha: </span>
                    <span> {{ $item->fecha_suscripcion_contrato }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8 ">
                    <span class="text-main-gray font-medium xl:hidden">nrodoc: </span>
                    <span> {{ $item->nrodoc }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Pariente: </span>
                    <span> {{ $item->nombrepariente }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Parentesco: </span>
                    <span> {{ $item->parentesco }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Tipo Conf Juridica: </span>
                    <span> {{ $item->tipo_conf_juridica }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Ruc Contratista: </span>
                    <span> {{ $item->ruc_contratista }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Nombre Contratista: </span>
                    <span> {{ $item->nombre_contratista }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Num Contrato: </span>
                    <span> {{ $item->num_contrato }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Contrato: </span>
                    <span> <a class="text-[blue]" href="{{ $item->urlcontrato }}" target="_Blank">Url
                            Contrato</a></span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                    <span> {{ $item->moneda }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Total: </span>
                    <span> {{ number_format(round($item->monto_contratado_item, 2)) }}</span>
                </p>
            @endforeach
        </div>
        <!-- Cuando no hay data -->
        @if (count($collection->items()) == 0)
            <p class=" text-center text-sm xl:text-base font-semibold">Sin Datos</p>
        @endif
    </article>
    <div class="flex justify-center py-8">
        {{ $collection->links() }}
    </div>
</div>
