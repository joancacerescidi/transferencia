    <article
        class="p-5 xl:p-10 bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer hover:shadow-lg">
        <header class="hidden xl:grid grid-cols-2 xl:grid-cols-12 gap-4 items-center text-xs xl:text-sm mb-6 xl:mb-14">
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
                Ruc
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
                Contrato
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Url
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Moneda
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
            <p class="xl:col-span-1 font-semibold hidden xl:flex items-center gap-2">
                Total
                {{-- <img src="{{ asset('images/icon-chevron-down-blue.png') }}" alt="w-max"> --}}
            </p>
        </header>
        <div class="grid xl:grid-cols-12 items-start gap-4 text-xs xl:text-sm mb-10 border-b pb-4 xl:pb-0 xl:border-0">
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
                    <span class="text-main-gray font-medium xl:hidden">Ruc: </span>
                    <span> {{ $item->ruc_contratista }}</span>
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
                    <span class="text-main-gray font-medium xl:hidden">Contrato: </span>
                    <span> {{ $item->num_contrato }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Url: </span>
                    <span> <a class="text-[blue]" href="{{ $item->urlcontrato }}" target="_Blank">Url
                            Contrato</a></span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Moneda: </span>
                    <span> {{ $item->moneda }}</span>
                </p>
                <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                    <span class="text-main-gray font-medium xl:hidden">Total: </span>
                    <span> {{ $item->monto_contratado_item }}</span>
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
