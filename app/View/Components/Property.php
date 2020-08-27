<?php

namespace App\View\Components;

use App\Company;
use Illuminate\View\Component;

class Property extends Component
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
        return view('components.property');
    }

    public function property(){
        return Company::all();
    }
}
