<?php

namespace App\View\Components;

use Illuminate\View\Component;

class comandaCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comanda;
    public $showRestaurantName;
    public function __construct($comanda, $showRestaurantName=true)
    {
        //
        $this->comanda=$comanda;
        $this->showRestaurantName=$showRestaurantName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comanda-card');
    }
}
