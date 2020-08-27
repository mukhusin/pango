<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $role = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    $output = array('success' => "/admin");
                    return response()->json($output);
                    break;
                case 'lessor':
                    $output = array('success' => "/lessor");
                    return response()->json($output);
                    break;
                case 'lessee':
                    $output = array('success' => "/lessor");
                    return response()->json($output);
                    break;
                case 'accountant':
                    $output = array('success' => "/lessor");
                    return response()->json($output);
                    break;      
                default:
                    $output = array('error' => "Sorry your are unauthorized !!");
                    return response()->json($output);
                    break;
            }
        }
        $output = array('error' => "Invalid Password or Enail !!");
        return response()->json($output);

    }
}
