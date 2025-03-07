<?php

namespace App\Http\Controllers;

use App\Models\Login_Logs;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function login()
    {
        return view('login');
    }
    public function check(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'regex:/^[6-9]\d{9}$/'],
            // 'captcha' => ['required'],
        ], [
            'phone.required' => 'Enter Mobile Number.',
            'phone.digits' => 'Enter a valid 10-digit mobile number.',
        ]);



        // Check if the phone number exists
        $user = Register::where('mobile', $request->phone)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'You are not a valid user. Please register now.'
            ], 422);
        }


        // Store login ID in session temporarily
        Session::put('login_user', $user->login_id);

        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully'
        ], 200);
    }

    public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|digits:6',
    ]);

    if ($request->otp !== '123456') {
        return response()->json([
            'success' => false,
            'message' => 'Invalid OTP. Please try again.'
        ], 422);
    }

    $loginUser = Session::get('login_user');
    if (!$loginUser) {
        return response()->json([
            'success' => false,
            'message' => 'Session expired. Please log in again.'
        ], 401);
    }

    // Fetch user details
    $user = Register::where('login_id', $loginUser)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404);
    }

    // ✅ Store login_id in session
    Session::put('login_id', $user->login_id);

    // ✅ Authenticate user
    Auth::login($user);

    // Insert login log
    Login_Logs::create([
        'login_id' => $user->login_id,
        'ipaddress' => request()->ip(),
        'Idate' => now(),
        'attempt' => 1,
        'duration' => 0.00,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Login successful',
        'redirect_url' => route('dashboard')
    ], 200);
}



    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }

    public function dashboard()
    {
        $loginId = session('login_id'); // Get login_id from session
    
        if (!$loginId) {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    
        // Fetch records from mst_workflows where login_id matches
        $workflows = \Illuminate\Support\Facades\DB::table('mst_workflows')->where('login_id', $loginId)->get();
    
        return view('user_login.index', compact('loginId', 'workflows'));
    }
    
}
