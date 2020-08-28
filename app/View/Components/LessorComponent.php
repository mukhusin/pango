<?php

namespace App\View\Components;

use App\Lessor;
use Illuminate\View\Component;

class LessorComponent extends Component
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
        return view('components.lessor-component');
    }

    public function lessors(){
        return Lessor::all();
    }
    public function setActive(){
        echo 'active';
    }
}
