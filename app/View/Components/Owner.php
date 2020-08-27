<?php

namespace App\View\Components;

use App\Company;
use App\CompanyOwner;
use Illuminate\View\Component;

class Owner extends Component
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
        return view('components.owner');
    }
    public function owner(){
        return CompanyOwner::all();
    }

    public function companies(){
        return Company::all();
    }
    public function companiesCount(){
        return Company::count();
    }
    public function companiesOwner(){
        return CompanyOwner::count();
    }
}