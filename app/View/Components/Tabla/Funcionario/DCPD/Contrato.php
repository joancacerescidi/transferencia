<?php

namespace App\View\Components\Tabla\Funcionario\DCPD;

use Illuminate\View\Component;

class Contrato extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $collection;
    public $orderTable;
    public $busquedaPalabra;

    public $idFuncionario;
    public $nivel;
    public $type;
    public $name;
    public $period;
    public function __construct($items, $orderTable, $busquedaPalabra, $idFuncionario, $nivel, $type, $name, $period)
    {
        //
        $this->collection = $items;
        $this->orderTable = $orderTable;
        $this->busquedaPalabra = $busquedaPalabra;

        $this->idFuncionario = $idFuncionario;
        $this->nivel = $nivel;
        $this->type = $type;
        $this->name = $name;
        $this->period = $period;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabla.funcionario.d-c-p-d.contrato');
    }
}
