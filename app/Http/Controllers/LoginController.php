<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Ghasedak\GhasedakApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\OTPContoller;

class LoginController extends Controller
{
    // ارسال OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|exists:users,phone',
        ], [
            'phone.required' => 'لطفا شماره موبایل را وارد کنید.',
            'phone.exists'   => 'این شماره موبایل در سیستم ثبت نشده است.',
        ]);

        $user = User::where('phone', $request->phone)->first();

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(2);
        $user->save();

       OTPContoller::sendOtp($request->phone, $otp);

        return redirect()->route('login.verify.form', ['phone' => $user->phone])
            ->with('status', 'کد ورود برای شما ارسال شد.');
    }

    // فرم تایید OTP
    public function showVerifyForm(Request $request)
    {
        return view('auth.verify', ['phone' => $request->phone]);
    }

    // تایید OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|exists:users,phone',
            'otp'   => 'required|string',
        ], [
            'otp.required' => 'لطفا کد تایید را وارد کنید.',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if (!$user || $user->otp !== $request->otp || $user->otp_expires_at < now()) {
            return back()->withErrors(['otp' => 'کد وارد شده معتبر نیست یا منقضی شده است.']);
        }

        // ورود موفق
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);

        if (Auth::user()->role == '1') {
            // return view('Admin.index'); // حذف این خط
            return redirect()->route('admin.dashboard')->with('success', 'به داشبورد ادمین خوش آمدید!'); // هدایت به داشبورد ادمین
        }

        return redirect()->route('dashboard')->with('success', 'خوش آمدید!');
    }
}
