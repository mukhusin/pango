<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function login(Request $request){
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::attempt(array($fieldType => $request->username, 'password' => $request->password))) {
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
                    $output = array('success' => "/lessee");
                    return response()->json($output);
                    break;
                case 'accountant':
                    $output = array('success' => "/accountant");
                    return response()->json($output);
                    break;      
                default:
                    $output = array('error' => "Sorry your are unauthorized !!");
                    return response()->json($output);
                    break;
            }
        }else {
            $output = array('error' => "Invalid Password or username !!");
            return response()->json($output);
        }
       

    }
}
