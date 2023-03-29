@extends('layout.app')
@section('content')
    <main class="border-t border-b">
        <section
            class="u-container grid xl:grid-cols-2 gap-8 items-center xl:my-20 xl:bg-body-bg xl:p-10 xl:rounded-xl xl:shadow-xl xl:border">
            <aside>
                <img src="../images/feedback-aside.png" alt="">
                <h2 class="text-center text-xl xl:text-3xl font-bold mb-4">
                    Danos tu opinión.
                </h2>
                <p class="xl:text-xl text-center">
                    Tu opinión es muy importante por eso nos gustaría que rellenaras el siguiente formulario.
                </p>
            </aside>
            <article>
                <form method="POST" id="feedback-form" action="{{ route('feedback.created') }}"
                    class="grid gap-6 xl:gap-10 bg-body-bg xl:bg-white py-10 px-6 xl:p-10 rounded-md shadow-lg border">
                    @csrf
                    <h2 class="text-center text-xl xl:text-3xl font-bold">
                        ¿Cómo podemos mejorar?
                    </h2>
                    @if (session('success'))
                        <h3 class="font-semibold text-sm xl:text-xl text-center">Tu opinión fue enviada con <span
                                class="text-green-500 font-bold">{{ session('success') }}</span></h3>
                    @endif
                    @if (session('errorSave'))
                        <h3 class="font-semibold text-sm xl:text-xl text-center">Lo sentimos hubo un <span
                                class="text-red-700 font-bold">{{ session('errorSave') }}</span> al guardar su opinión</h3>
                    @endif
                    <div>
                        <label class="font-semibold text-xs xl:text-sm block mb-1" for="opinion">Danos tu opinión de que
                            podriamos mejorar.</label>
                        <textarea name="detalle" id="detalle" rows="3" placeholder="Escribe aqui su opinión..."
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('detalle') ring ring-red-500  @enderror"">{{ old('detalle') }}</textarea>
                        @error('detalle')
                            <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                    <h4 class="font-bold xl:text-lg">Datos de contacto</h4>
                    <div>

                        <label for="nombres" class="font-semibold text-xs xl:text-sm block mb-1">Nombre:</label>
                        <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}"
                            placeholder="Ingrese su nombre"
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('nombre') ring ring-red-500  @enderror">
                        @error('nombre')
                            <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="nombres" class="font-semibold text-xs xl:text-sm block mb-1">Teléfono:</label>
                        <input id="telefono" name="telefono" type="number" value="{{ old('telefono') }}"
                            placeholder="Ingrese su teléfono"
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('telefono') ring ring-red-500  @enderror">
                        @error('telefono')
                            <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="font-semibold text-xs xl:text-sm block mb-1">Correo
                            electrónico:</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            placeholder="Ingrese su email"
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('email') ring ring-red-500  @enderror"">
                        @error('email')
                            <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                    <button data-sitekey="6LeDPkElAAAAAPswSAkRZxKt4nqx4Tfqbobl0nXe" data-callback='onSubmit'
                        data-action='submit'
                        class="g-recaptcha block w-full p-5 bg-main-blue text-white font-semibold rounded-md text-sm">Enviar</button>
                </form>
            </article>
        </section>
    </main>
@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("feedback-form").submit();
        }
    </script>
@endsection
