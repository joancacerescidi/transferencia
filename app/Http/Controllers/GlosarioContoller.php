<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class GlosarioContoller extends Controller
{
    //
    public function index()
    {
        $this->seo();
        return view('glosario.index');
    }
    public function seo()
    {
        SEOTools::setTitle('Qullqita Qitapay - Glosario', false);
        SEOTools::setDescription('Qullqita Qitapay - Glosario - Como calificamos/explicación de indices - Dentro del ranking de entidades, proveemos la siguiente información:
- Dentro del ranking de proveedores proveemos la siguiente información - Dentro del ranking de funcionarios, proveemos la siguiente información');
        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
