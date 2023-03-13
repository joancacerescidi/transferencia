@extends('layout.app')
@section('content')
 <main class="min-h-screen bg-body-bg">
    <div class="u-container xl:w-6/12">
      <article class="px-5 py-6 xl:p-10">
        <h3 class="text-xl xl:text-3xl font-bold mb-10 xl:text-center">Suscripciones</h3>
        
        <h3 class="font-bold mb-6 xl:text-center text-sm xl:text-xl">
          Información  de suscripciones
        </h3>
        <div class="text-sm xl:text-lg grid gap-8">
          <p>La suscripcion tiene los siguientes beneficios</p>
          <ul class="pl-3 xl:pl-6 grid gap-4">
            <li class="flex items-center gap-3"><span class="block w-3 xl:w-2 h-2 rounded-full bg-gray-800"></span> Podras acceder de forma ilimitada a toda la informacion procesada</li>
            <li class="flex items-center gap-3"><span class="block w-3 xl:w-2 h-2 rounded-full bg-gray-800"></span> Recibiras notificaciones cuando carguemos nueva informacion</li>
            <li class="flex items-center gap-3"><span class="block w-3 xl:w-2 h-2 rounded-full bg-gray-800"></span> Atenderemos tus solicitudes de soporte si tienes algun problema</li>
          </ul>
          <p>
            El costo de la suscripcion es de USD 3 (dolares americanos) y se cobra de forma mensual
          </p>
          <p>
            Puedes desuscribirte en cualquier momento si siente que nuestro servicio no te agrega valor, nuestro compromiso es de brindarte la mejor informacion.
          </p>
          
          <a href="{{ url('/dashboard') }}" class="mx-auto mt-6 xl:w-max font-semibold text-white bg-blue-500 p-5 xl:px-14 rounded-md cursor-pointer block">
            Suscribete
          </a>
        </div>
      </article>
    </div>
  </main>
@endsection
