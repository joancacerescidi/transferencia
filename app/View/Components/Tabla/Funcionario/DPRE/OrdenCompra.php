<?php

namespace App\View\Components\Tabla\Funcionario\DPRE;

use Illuminate\View\Component;

class OrdenCompra extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $collection;
    public function __construct($items)
    {
        //
        $this->collection = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabla.funcionario.d-p-r-e.orden-compra');
    }
}