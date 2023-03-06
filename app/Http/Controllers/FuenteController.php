<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
class FuenteController extends Controller
{
    //
    public function index()
    {
        $this->seo();
        return view('fuente.index');
    }
    public function seo()
    {
        SEOTools::setTitle('Qullqita Qitapay - Descargo de responsabilidad', false);
        SEOTools::setDescription('Qullqita Qitapay - Descargo de responsabilidad: Toda la información de este sitio web se publica de buena fe y únicamente con fines de información general. No se garantiza la integridad, fiabilidad y exactitud de esta información. Cualquier acción que usted tome sobre la información que se encuentra en este sitio web, es estrictamente bajo su propio riesgo. no será responsable por cualquier pérdida y / o daños en relación con el uso de nuestro sitio web.');
        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
