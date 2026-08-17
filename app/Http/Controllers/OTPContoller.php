<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class OTPContoller extends Controller
{
    public static function sendOtp($mobile, $code)
    {
        $template = 'NeliGallery';
        try {
            $data = [
                'receptor' => $mobile,
                'template' => $template,
                'type'     => 1,
                'param1'   => (string) $code,
            ];

            $client = new \GuzzleHttp\Client();

            $res = $client->post('https://api.ghasedak.me/v2/verification/send/simple', [
                'headers' => [
                    'apikey' => '6ddffc750c2d488ea402a812898a5f98dd89cd51f19f3e82062190e6edfd2e6c',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'cache-control' => 'no-cache',
                ],
                'form_params' => $data
            ]);

            $body = json_decode((string) $res->getBody(), true);



            if (isset($body['result']['code']) && $body['result']['code'] == 200) {
                return response()->json(['ok' => true, 'message' => 'OTP sent']);
            }

            return response()->json(['ok' => false, 'error' => $body], 500);
        }catch (RequestException $e) {


            dd(config('services.ghasedak.key'));

            dd([
                'message' => $e->getMessage(),
                'response' => $e->hasResponse()
                    ? (string) $e->getResponse()->getBody()
                    : 'No response from server',

            ]);
        }







    }

    public function verify(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('phone', $request->phone)
            ->where('otp', $request->otp)
            ->first();

        if (!$user) {
            return back()->withErrors(['otp' => 'کد تایید اشتباه است']);
        }

        $user->otp = null;
        $user->phone_verified_at = now();
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
