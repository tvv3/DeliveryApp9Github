<?php

namespace App\View\Components;

use Illuminate\View\Component;

class formStatusNouComanda extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comanda;
    public $disableBtn;
    public function __construct($comanda, $disableBtn=null)
    {
        //
        $this->comanda=$comanda;
        $this->disableBtn=$disableBtn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-status-nou-comanda');
    }
}
