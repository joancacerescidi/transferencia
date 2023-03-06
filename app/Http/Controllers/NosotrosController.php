<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class NosotrosController extends Controller
{
    //
    public function index()
    {
        $this->seo();
        return view('nosotros.index');
    }
    public function seo()
    {
        SEOTools::setTitle('Qullqita Qitapay - Nosotros', false);
        SEOTools::setDescription('Qullqita Qitapay
¿Qué significa Qullqita Qitapay?

Es la mejor traducción que encontramos en quechua al término conocido en inglés “Follow the Money” o en español “Sigue el dinero”. Nuestro dominio es www.qqperu.com

¿Qué es?

Es una iniciativa ciudadana que trata datos abiertos del Estado sobre el uso del presupuesto nacional. En esta primera etapa, hemos consolidado sólo datos desde enero 2018 y está actualizado hasta diciembre 2022.

El alcance inicial incluye aquellos gastos comprometidos en Contratos u Órdenes de Compra por el momento:

Datos abiertos de OSCE
Datos abiertos de SUNAT
Datos abiertos de Contraloría
El portal permitire analizar e investigar información relevante sobre el uso del dinero. Los datos han sido estructurados en bases de datos para que puedan ser explotados inicialmente con analítica básica. Los datos no han sido modificados por lo que podrán visualizar algunas inconsistencias de origen que proviene de las fuentes.

¿Para qué existe?

Para facilitar de manera abierta la investigación y datos sobre el uso del dinero en el Estado. No sacamos conclusiones.

¿Quiénes podrán usarla?

Cualquier ciudadano o persona que busque acceder fácilmente a información inicial y sin restricciones. Por el momento no tiene un costo. La iniciativa es financiada con fondos privados voluntarios.');
        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
