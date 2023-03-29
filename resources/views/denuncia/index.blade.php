@extends('layout.app')
@section('content')
    <main class="border-t border-b">
        <section
            class="u-container grid xl:grid-cols-2 gap-8 items-center xl:my-20 xl:bg-body-bg xl:p-10 xl:rounded-xl xl:shadow-xl xl:border">
            <aside>
                <img src="../images/denuncia-aside.png" alt="">
                <h2 class="text-center text-xl xl:text-3xl font-bold mb-4">
                    Comparte información
                </h2>
                <p class="xl:text-xl text-center">
                    Si tienes conocimiento de información que podría servir, puedes rellenar
                    el siguiente formulario y ayudar a la justicia.
                </p>
            </aside>
            <article>
                <form method="POST" id="denuncia-form" enctype="multipart/form-data" action="{{ route('denuncia.created') }}"
                    class="grid gap-6 xl:gap-10 bg-body-bg xl:bg-white py-10 px-6 xl:p-10 rounded-md shadow-lg border">
                    {{ csrf_field() }}
                    <h2 class="text-center text-xl xl:text-3xl font-bold">
                        Comparte información
                    </h2>
                    @if (session('success'))
                        <h3 class="font-semibold text-sm xl:text-xl text-center">Tu información fue enviada con <span
                                class="text-green-500 font-bold">{{ session('success') }}</span></h3>
                    @endif
                    @if (session('errorSave'))
                        <h3 class="font-semibold text-sm xl:text-xl text-center">Lo sentimos hubo un <span
                                class="text-red-700 font-bold">{{ session('errorSave') }}</span> al compartir tu información
                        </h3>
                    @endif
                    <h4 class="font-bold xl:text-lg">Datos de la entidad :</h4>
                    <div class="grid xl:grid-cols-2 gap-6 xl:gap-10">
                        <div>
                            <label for="entidad" class="font-semibold text-xs xl:text-sm block mb-1">RUC Entidad</label>
                            <input value="{{ old('ruc_entidad') }}" name="ruc_entidad" id="ruc_entidad" type="number"
                                placeholder="RUC Entidad"
                                class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('ruc_entidad') ring ring-red-500  @enderror"">
                            @error('ruc_entidad')
                                <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="contrato" class="font-semibold text-xs xl:text-sm block mb-1">Entidad</label>
                            <input value="{{ old('entidad') }}" id="entidad" name="entidad" type="text"
                                placeholder="Entidad"
                                class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('entidad') ring ring-red-500  @enderror"">
                            @error('entidad')
                                <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="font-semibold text-xs xl:text-sm block mb-1" for="informacion">Ingresa la información
                            que tengas</label>
                        <textarea name="detalle" id="detalle" rows="4" placeholder="Escribe aqui..."
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('detalle') ring ring-red-500  @enderror"">{{ old('detalle') }}</textarea>
                        @error('detalle')
                            <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                    <h4 class="font-bold xl:text-lg">Datos de contacto :</h4>

                    <div>
                        <label for="nombres" class="font-semibold text-xs xl:text-sm block mb-1">Nombre</label>
                        <input id="nombres" value="{{ old('nombres') }}" name="nombres" type="text"
                            placeholder="Nombres"
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('nombres') ring ring-red-500  @enderror" ">
                                                                        @error('nombres')
        <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
    @enderror
                                                                </div>
                                                            <div class="grid xl:grid-cols-2 gap-6 xl:gap-10">

                                                                 <div>
                                                                   <label for="email" class="font-semibold text-xs xl:text-sm block mb-1">Teléfono</label>
                                                                   <input id="telefono" value="{{ old('telefono') }}" name="telefono" type="number" placeholder="Teléfono"
                                                                      class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('telefono') ring ring-red-500  @enderror"">
                        @error('telefono')
                            <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="font-semibold text-xs xl:text-sm block mb-1">Correo electrónico
                            electrónico</label>
                        <input value="{{ old('email') }}" id="email" name="email" type="email"
                            placeholder="Correo electrónico"
                            class="text-sm block w-full p-4 rounded-md border shadow-md focus:outline-none focus:ring focus:ring-main-blue @error('email') ring ring-red-500  @enderror"">
                        @error('email')
                            <span class="py-2 text-red-500 text-xs xl:text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>

                    <div>
                        <span for="" class="font-semibold text-xs xl:text-sm block mb-1">Archivo adjunto</span>
                        <label for="archivo"
                            class="text-sm w-full p-4 rounded-md border bg-white shadow-md flex items-center gap-4 cursor-pointer">
                            <img src="../images/file.png" id="archivo-icon" alt="">
                            <span id="archivo-description">
                                Adjuntar archivo (opcional) - máx 10MB
                            </span>

                        </label>
                        <input type="file" name="files[]" class="hidden" id="archivo"
                            accept="image/png,image/jpeg,image/jpg,.pdf" multiple>
                        @error('files.*')
                            <span class="py-2 text-red-500 text-xs xl:text-sm block">
                                <ul>
                                    <li>Se aceptan png,jpeg,jpg y pdfs</li>
                                    <li>Cada archivo no debe superar los 10MB</li>
                                </ul>
                            </span>
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
            document.getElementById("denuncia-form").submit();
        }
    </script>
    <script>
        const $file = document.getElementById('archivo')
        const $fileIcon = document.getElementById('archivo-icon')
        const $fileDescription = document.getElementById('archivo-description')

        $file.addEventListener('change', (event) => {
            const fileList = event.target.files;

            if (fileList.length === 0) {
                $fileDescription.innerHTML = 'Adjuntar archivo'
                $fileIcon.setAttribute('src', '/images/file.png')
            }

            if (fileList.length > 0) {
                $fileDescription.innerHTML = `
          <b class="pr-2">${fileList.length}</b>
          ${
            fileList.length > 1 
              ? 'Archivos subidos con exito'
              : 'Archivo subido con exito'
          }
        `
                $fileIcon.setAttribute('src', '/images/icon-check.svg')
            }
        })
    </script>
@endsection
