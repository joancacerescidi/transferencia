   <article
        class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg overflow-x-auto">
        <header
            class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-12 gap-4 items-center text-xs xl:text-sm mb-6 xl:mb-14 xl:overflow-x-auto u-table-row">
            <p class="xl:col-span-1 font-semibold flex items-center gap-2">
                Cargo
                {{-- <img src="{{ asset('images/icon-chevron-up.png') }}" class="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold flex items-center">
                Entidad
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                Descripción
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2 ">
                Fecha
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Ruc Pariente
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
                Ruc consorcio
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Consorcio
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Contrato
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Total
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>

        </header>
       <div
            class="px-5 py-5 xl:py-0 grid xl:grid-cols-12 items-start gap-4 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0 xl:overflow-x-auto u-table-row">
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
                    <span class="text-main-gray font-medium xl:hidden">Ruc Pariente: </span>
                    <span> {{ $item->rucpariente }}</span>
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
                    <span class="text-main-gray font-medium xl:hidden">Ruc consorcio: </span>
                    <span> {{ $item->ruc_consorcio }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Consorcio: </span>
                    <span>{{ $item->consorcio }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Contrato: </span>
                    <span> {{ $item->num_contrato }} <br> <a class="text-[blue]" href="{{ $item->urlcontrato }}"
                            target="_Blank">Url
                            Contrato</a></span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Total: </span>
                    <span>{{ $item->moneda }} {{ $item->monto_contratado_item }}</span>
                </p>
            @endforeach

        </div>
        @if (count($collection->items()) == 0)
            <p class=" text-center text-sm xl:text-base font-semibold">Sin Datos</p>
        @endif
    </article>
    <div class="flex justify-center py-8">
        {{ $collection->links() }}
    </div>
    </div>
