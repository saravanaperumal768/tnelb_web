<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Register; 

use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Transgender',
            'PhoneNo' => 'required|digits:10',
            'EmailAddress' => 'nullable|email',
            'Address' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'pincode' => 'required|digits:6',
        ]);
    
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
    
        
        Register::create([
            'name' => $request->Name,
            'gender' => $request->gender,
            'mobile' => $request->PhoneNo,
            'email' => $request->EmailAddress,
            'address' => $request->Address,
            'state' => $request->state,
            'district' => $request->district,
            'pincode' => $request->pincode,
        ]);
    
        
        return response()->json([
            'success' => true,
            'message' => 'Registration successful!'
        ], 200);
    }

    public function user_login(){
        return view('user_login.index');
    }

    public function apply_form_s(){
        return view('user_login.apply-form-s');
    }

    public function apply_form_w(){
        return view('user_login.apply-form-w');
    }
    
    
}
