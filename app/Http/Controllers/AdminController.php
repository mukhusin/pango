<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyOwner;
use App\Lessee;
use App\Lessor;
use App\Property;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function lessor(){
        return view('auth.admin.lessor')->with('active',true);
    }
    public function ownerData(){
        $owner = Lessee::all();
        return view('auth.admin.owner')->with('owner',$owner);
    }
    public function property(){
        return view('auth.admin.property');
    }
    public function addLessor(Request $request){
        $rules = array(
            // 'file'  => 'required|image|max:2048',

            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'nida' => ['required', 'string','max:30'],

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{
             $lessor =  User::create([
                            'role' => 'lessor',
                            'email' => $request->email,
                            'username' => $request->phone,
                            'verification_code' => sha1(now()),
                            'password' => Hash::make($request->phone),
                        ]);
               $id = $lessor->id;
           if ($id != "") {
                Lessor::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'nida' => $request->nida,
                    'user_id' => $id,
                ]);
           }
            
            return response()->json(['success' => 'Lessor details saved successfully']);
        }
       
    }

    public function updateChair(Request $request){
        $rules = array(
            // 'file'  => 'required|image|max:2048',

            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'nida' => ['required', 'string','max:30'],

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['error' => $error->errors()->all()]);
        }else{
            $update = Lessor::find($request->id);
            $update->name = $request->name;
            $update->phone = $request->phone;
            $update->address = $request->address;
            $update->nida = $request->nida;
            $update->save();
            return response()->json(['success' => "Lessor details updated successfully"]);
        }
    }

    public function addProperty(Request $request){
      //  dd($request->all());
        $rules = array(
            // 'file'  => 'required|image|max:2048',

            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'licence' => ['required', 'string', 'max:255'],
            'abbriviation' => ['required', 'string','max:30'],
            'apartment' => ['required', 'integer'],
            'contract_date' => ['required', 'string','max:30'],
           
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{
             //owner_id 	name 	address 	licence 	contract_date 	apartment_num 	abbriviation
            Property::create([
                'name' => $request->name,
                'address' => $request->address,
                'owner_id' => $request->owner_id,
                'licence' => $request->licence,
                'contract_date' => $request->contract_date,
                'apartment_num' => $request->apartment,
                'abbriviation' => $request->abbriviation,
            ]);
           
            return response()->json(['success' => 'Property details saved successfully']);
        }
       
    }
    public function updateProperty(Request $request){
        return response()->json(['success' => "Property details updated successfully"]);
    }
}
