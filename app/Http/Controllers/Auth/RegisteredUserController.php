<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Ghasedak\GhasedakApi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\OTPContoller;


class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }


    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
        ], [
            'name.required'  => 'لطفا نام و نام خانوادگی خود را وارد کنید.',
            'name.string'    => 'نام باید به صورت متن باشد.',
            'name.max'       => 'نام نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'phone.required' => 'لطفا شماره موبایل را وارد کنید.',
            'phone.string'   => 'فرمت شماره موبایل نامعتبر است.',
            'phone.unique'   => 'این شماره موبایل قبلاً ثبت شده است.',
        ]);

        $user = User::create([
            'name'  => $request->name,
            'phone' => $request->phone,
        ]);

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(2);
        $user->save();

        OTPContoller::sendOtp($user->phone, $otp);


        return redirect()->route('verify.otp.form', ['phone' => $user->phone])
            ->with('status', 'کد تایید به شماره شما ارسال شد.');
    }
}
