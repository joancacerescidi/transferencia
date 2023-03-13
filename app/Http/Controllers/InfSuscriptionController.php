<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class InfSuscriptionController extends Controller
{
    //
    public function index()
    {
        $this->seo();
        return view('suscription.index');
    }
    public function seo()
    {
        SEOTools::setTitle('Qullqita Qitapay - Suscripción', false);
        SEOTools::setDescription('Información de suscripciones
La suscripcion tiene los siguientes beneficios
Podras acceder de forma ilimitada a toda la informacion procesada
Recibiras notificaciones cuando carguemos nueva informacion
Atenderemos tus solicitudes de soporte si tienes algun problema
El costo de la suscripcion es de USD 3 (dolares americanos) y se cobra de forma mensual
Puedes desuscribirte en cualquier momento si siente que nuestro servicio no te agrega valor, nuestro compromiso es de brindarte la mejor informacion.');
        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
