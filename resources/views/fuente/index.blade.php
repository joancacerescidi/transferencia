@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="u-container">
            <h2 class="text-center text-xl xl:text-4xl font-bold mb-14">
                Descargo de responsabilidad
            </h2>

            <p class="text-sm xl:text-base">
                Toda la información de este sitio web se publica de buena fe y únicamente con fines de información general.
                No se garantiza la integridad, fiabilidad y exactitud de esta información. Cualquier acción que usted tome
                sobre la información que se encuentra en este sitio web, es estrictamente bajo su propio riesgo. no será
                responsable por cualquier pérdida y / o daños en relación con el uso de nuestro sitio web.
            </p>
            <h3 class="xl:text-lg font-bold my-8">Consentimiento</h3>
            <p class="text-sm xl:text-base">
                Al utilizar nuestro sitio web, usted acepta nuestra cláusula de exención de responsabilidad y está de
                acuerdo con sus términos.
            </p>
            <h3 class="xl:text-lg font-bold my-8">Fuentes de información</h3>
            <p class="text-sm xl:text-base mb-8">
                Para la elaboración de las vistas de este sitio web se han utilizado fuentes de datos abiertos, disponibles
                al público en general, de las entidades del estado peruano. Podemos mencionar entre ellas:
            </p>
            <ul class="list-disc pl-10 grid gap-6 xl:gap-10">
                <li>
                    Portal de datos abiertos de OSCE
                    <a href="https://bi.seace.gob.pe/pentaho/api/repos/%3Apublic%3Aportal%3Adatosabiertos.html/content?userid=public&password=key"
                        class="text-blue-500 underline" target="_blank">Aqui</a>
                </li>
                <li>
                    Información de datos abiertos de SUNAT
                    <a href="https://www.datosabiertos.gob.pe/group/sunat" class="text-blue-500 underline"
                        target="_blank">Aqui</a>
                </li>
                <li>
                    Información de las declaraciones juradas de interés de funcionarios públicos, del portal de
                    declaraciones juradas de interés de la Contraloría.
                    <a href="https://appdji.contraloria.gob.pe/djic/" class="text-blue-500 underline"
                        target="_blank">Aqui</a>
                </li>
            </ul>
            <h3 class="xl:text-lg font-bold my-8">Actualización</h3>
            <p class="text-sm xl:text-base">
                En caso de que actualicemos, modifiquemos o hagamos algún cambio en este documento, dichos cambios se
                publicarán aquí de forma destacada.
            </p>
        </section>
    </main>
@endsection
