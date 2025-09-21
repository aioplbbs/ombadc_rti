<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SmsService;
use App\Models\User;
use Session;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->user()->hasRole('Consumer')){
            return redirect()->route('rti.index');
        }
        return view('dashboard');
    }

    public function userLogin()
    {
        if(empty(Session::get('mobile'))){
            return view('user_auth.login');
        }else{
            return view('user_auth.otp');
        }
    }

    public function userLoginProcess(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
        ]);

        $user = User::where('mobile', $request->mobile)->first();
        if ($user) {
            Session::put('attempt', 1);
            $res = $this->__sendOtp($request->mobile);
            return redirect()->back()->with('status', $res);
        }
        return redirect()->back()->withErrors(['mobile' => 'Mobile Number is not found']);
    }

    public function resendOTP()
    {
        $mobile = Session::get('mobile');
        $otp = Session::get('otp');
        if(Session::get('otp') != 2){
            $this->__sendOtp();
            Session::put('attempt', 2);
            return redirect()->back()->with('success', "OTP Resend");
        }
        return redirect()->back()->with('error', 'OTP Resend Attemted Max');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        if ($request->otp == Session::get('otp')) {
            // Authenticate user
            $mobile = Session::get('mobile');
            $user = User::where('mobile', $mobile)->first();
            if ($user) {
                Auth::login($user);
                Session::forget(['otp', 'mobile', 'attempt']);
                return redirect(url('/dashboard'));
            }
            return back()->withErrors(['mobile' => 'User not found']);
        }

        return back()->withErrors(['otp' => 'Invalid OTP']);
    }

    private function __sendOtp($mobile, $otp = '')
    {
        if(empty($otp)){
            $otp = rand(100000, 999999);
        }
        Session::put('otp', $otp);
        Session::put('mobile', $mobile);
        // $msg = "Use OTP ".$otp." for OMBADC RTI. This OTP is valid for 5 min.";
        $msg="Use OTP ".$otp." for Dolphin Motor Boat Association. This OTP is valid within 10 mins. Thanks, Regard DMBASP, Powered by All India Online Pvt. Ltd.";
        $smsservice = new SmsService();
        // $res = $smsservice->send($mobile, $msg);
        return $otp;
    }
}