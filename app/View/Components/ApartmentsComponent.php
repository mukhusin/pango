<?php

namespace App\View\Components;

use App\Apartment;
use Illuminate\View\Component;

class ApartmentsComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.apartments-component');
    }
    public function apartments(){
        return Apartment::all();
    }
}
