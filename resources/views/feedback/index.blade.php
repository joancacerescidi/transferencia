@extends('layout.app')
@section('content')
    <main class="border-t border-b">
        <section
            class="u-container grid xl:grid-cols-2 gap-8 items-center xl:my-20 xl:bg-body-bg xl:p-10 xl:rounded-xl xl:shadow-xl xl:border">
            <aside>
                <img src="../images/feedback-aside.png" alt="">
                <h2 class="text-center text-xl xl:text-3xl font-bold mb-4">
                    Lorem, ipsum dolor.
                </h2>
                <p class="xl:text-xl text-center">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum, quis.
                </p>
            </aside>
            <article>
                <form class="grid gap-6 xl:gap-10 bg-body-bg xl:bg-white py-10 px-6 xl:p-10 rounded-md shadow-lg border">
                    <h2 class="text-center text-xl xl:text-3xl font-bold">
                        ¿Como podemos mejorar?
                    </h2>
                    <div>
                        <label class="font-semibold text-xs xl:text-sm block mb-1" for="opinion">Danos tu opinión de que
                            podriamos mejorar.</label>
                        <textarea name="" id="opinion" rows="3" placeholder="Escribe aqui..."
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue"></textarea>
                    </div>
                    <h4 class="font-bold xl:text-lg">Datos de contacto</h4>
                    <div>
                        <label for="nombres" class="font-semibold text-xs xl:text-sm block mb-1">Nombres</label>
                        <input id="nombres" type="text" placeholder="Nombres"
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue ring ring-red-500">
                        <span class="py-2 text-red-500 text-xs xl:text-sm block">Lorem ipsum dolor sit.</span>
                    </div>
                    <div>
                        <label for="email" class="font-semibold text-xs xl:text-sm block mb-1">Correo electrónico</label>
                        <input id="email" type="email" placeholder="E-mail"
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue">
                    </div>
                    <div>
                        <span for="" class="font-semibold text-xs xl:text-sm block mb-1">Archivo adjunto</span>
                        <label for="archivo"
                            class="text-sm w-full p-4 rounded-md border bg-white shadow-md flex items-center gap-4 cursor-pointer">
                            <img src="../images/file.png" alt="">
                            Adjuntar archivo
                        </label>
                        <input type="file" class="hidden" id="archivo">
                    </div>
                    <button type="submit"
                        class="block w-full p-5 bg-main-blue text-white font-semibold rounded-md text-sm">Enviar</button>
                </form>
            </article>
        </section>
    </main>
@endsection
