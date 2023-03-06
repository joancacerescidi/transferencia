<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="u-container ">
                    {{-- Perfil del usuario --}}
                    <section id="perfilUser" class="bg-white rounded-md shadow-lg">
                        <header class="flex">
                            <button type="button"
                                class="text-sm xl:text-base w-full xl:w-72 p-5 flex items-center gap-4 font-semibold bg-main-blue hover:bg-main-blue text-white transition-colors rounded-tl-md rounded-tr-md">
                                <img src="{{ asset('images/user-icon.svg') }}">
                                Mi Perfil
                            </button>
                            <button type="button" onclick="susciptionUser()"
                                class="text-sm xl:text-base w-full xl:w-72 p-5 flex items-center gap-4 bg-gray-800 hover:bg-main-blue text-white transition-colors rounded-tl-md rounded-tr-md">
                                <img src="{{ asset('images/suscripcion-icon.svg') }}">
                                Suscripciones
                            </button>
                        </header>

                        <article class="px-5 py-6 xl:p-10">
                            <h3 class="text-xl xl:text-3xl font-bold text-main-blue mb-10">Mi Perfil</h3>
                            <h3 class="font-bold text-text-blue text-sm xl:text-lg mb-8">Información del cliente
                            </h3>
                            <div class="grid xl:grid-cols-2 gap-8 ">
                                <div>
                                    <label for="nombres"
                                        class="block mb-2 font-semibold text-xs xl:text-sm">Nombres:</label>
                                    <input id="nombres" value="{{ Auth::user()->name }}"
                                        class="p-6 w-full text-sm xl:text-base bg-gray-100 bg-opacity-30 shadow-md rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                                        type="text" placeholder="Nombre del usuario" disabled>
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-2 font-semibold text-xs xl:text-sm">Email:</label>
                                    <input id="email" value="{{ Auth::user()->email }}"
                                        class="p-6 w-full text-sm xl:text-base bg-gray-100 bg-opacity-30 shadow-md rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                                        type="text" placeholder="Email del usuario" disabled>
                                </div>
                                <div>
                                    <label for="verificacion"
                                        class="block mb-2 font-semibold text-xs xl:text-sm">Verificación
                                        Email:</label>
                                    <input id="verificacion"
                                        value="{{ Auth::user()->email_verified_at ? 'Verificado' : 'Sin verificar' }}"
                                        class="p-6 w-full text-sm xl:text-base bg-gray-100 bg-opacity-30 shadow-md rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                                        type="text" placeholder="Estado de la verificación" disabled>
                                </div>
                                <div>
                                    <label for="tipo_registro" class="block mb-2 font-semibold text-xs xl:text-sm">Tipo
                                        de
                                        registro:</label>
                                    <input id="tipo_registro" value="<?php if (Auth::user()->type_auth == 'facebook') {
                                        echo 'Facebook';
                                    } elseif (Auth::user()->type_auth == 'google') {
                                        echo 'Google';
                                    } else {
                                        echo 'Formulario';
                                    }
                                    ?>"
                                        class="p-6 w-full text-sm xl:text-base bg-gray-100 bg-opacity-30 shadow-md rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                                        type="text" placeholder="Tipo de registro" disabled>
                                </div>
                                <div>
                                    <label for="rol_usuario" class="block mb-2 font-semibold text-xs xl:text-sm">Rol
                                        de usuario:</label>
                                    <input id="rol_usuario"
                                        value="{{ Auth::user()->type == 'free' ? 'Gratuito' : 'Suscripto' }}"
                                        class="p-6 w-full text-sm xl:text-base bg-gray-100 bg-opacity-30 shadow-md rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                                        type="text" placeholder="Rol de usuario" disabled>
                                </div>
                            </div>
                        </article>

                    </section>
                    {{-- Suscripciones --}}
                    <section id="userSuscripcion" class="hidden bg-white rounded-md shadow-lg">
                        <header class="flex">
                            <button type="button" onclick="perfilUser()"
                                class="text-sm xl:text-base w-full xl:w-72 p-5 flex items-center gap-4 bg-gray-800 hover:bg-main-blue text-white transition-colors rounded-tl-md rounded-tr-md">
                                <img src="{{ asset('images/user-icon.svg') }}" class="">
                                Mi Perfil
                            </button>
                            <button type="button"
                                class="text-sm xl:text-base w-full xl:w-72 p-5 flex items-center gap-4 font-semibold bg-main-blue hover:bg-main-blue text-white transition-colors rounded-tl-md rounded-tr-md">
                                <img src="{{ asset('images/suscripcion-icon.svg') }}" class="">
                                Suscripciones
                            </button>
                        </header>
                        <article class="px-5 py-6 xl:p-10">
                            <div class="flex flex-col xl:flex-row gap-6 xl:items-center justify-between mb-10">
                                <h3 class="text-xl xl:text-3xl font-bold text-main-blue ">Suscripciones</h3>
                                <div class="flex flex-col xl:flex-row gap-6">
                                    <button
                                        class="font-semibold text-red-500 border border-red-500 p-5 rounded-md cursor-pointer block">
                                        Cancelar suscripcion
                                    </button>
                                    <button
                                        class="font-semibold text-white bg-blue-500 p-5 rounded-md cursor-pointer block">
                                        Suscribete
                                    </button>
                                </div>
                            </div>
                            <h3 class="font-bold text-text-blue text-sm xl:text-lg mb-8">Información de suscripciones
                            </h3>
                            <article
                                class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6 cursor-pointer shadow-md overflow-x-auto">
                                <header
                                    class="bg-gray-800 text-white p-5 hidden xl:grid grid-cols-2 xl:grid-cols-11 gap-8 items-center text-xs xl:text-sm mb-6 xl:mb-14">
                                    <p class="xl:col-span-8 font-semibold flex items-center gap-2">
                                        Comentario

                                    </p>
                                    <p class="xl:col-span-2 font-semibold flex items-center gap-2">
                                        Fecha

                                    </p>
                                    <p class="xl:col-span-1 font-semibold flex items-center">
                                        Monto

                                    </p>
                                </header>
                                <div
                                    class="px-5 py-5 grid xl:grid-cols-11 items-start gap-8 text-xs xl:text-sm mb-10 border-b">
                                    <p class="xl:col-span-8 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                        <span class="text-main-gray font-medium xl:hidden">Comentario:</span>
                                        Cobro de suscripción
                                    </p>
                                    <p class="xl:col-span-2 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                                        <span class="text-main-gray font-medium xl:hidden">Fecha:</span>
                                        12/12/1999
                                    </p>
                                    <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                        <span class="text-main-gray font-medium xl:hidden">Monto:</span>
                                        150
                                    </p>

                                </div>
                                <div class="px-5 py-5 grid xl:grid-cols-11 items-start gap-8 text-xs xl:text-sm">
                                    <p class="xl:col-span-8 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                        <span class="text-main-gray font-medium xl:hidden">Comentario:</span>
                                        Cobro de suscripción
                                    </p>
                                    <p class="xl:col-span-2 font-semibold grid grid-cols-2 xl:block items-center gap-8">
                                        <span class="text-main-gray font-medium xl:hidden">Fecha:</span>
                                        12/12/1999
                                    </p>
                                    <p class="xl:col-span-1 font-medium grid grid-cols-2 xl:block items-center gap-8">
                                        <span class="text-main-gray font-medium xl:hidden">Monto:</span>
                                        150
                                    </p>

                                </div>
                            </article>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function perfilUser() {
            const userSection = document.getElementById('perfilUser');
            const userSuscription = document.getElementById('userSuscripcion');
            userSection.classList.remove("hidden");
            userSuscription.classList.add("hidden");
        }

        function susciptionUser() {
            const userSuscription = document.getElementById('userSuscripcion');
            const userSection = document.getElementById('perfilUser');
            userSuscription.classList.remove("hidden");
            userSection.classList.add("hidden");


        }
    </script>
</x-app-layout>
