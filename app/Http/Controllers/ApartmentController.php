<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function apartment(){
        return view('auth.lessor.apartment');
    }
}
