<?php

namespace App\View\Components;

use App\Property;
use Illuminate\View\Component;

class PropertyComponent extends Component
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
        return view('components.property-component');
    }

    public function properties(){
        return Property::all();
    }
}
