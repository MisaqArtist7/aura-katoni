<?php

namespace App\Http\Controllers;

use App\Traits\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class SMSController extends Controller
{
    use Logger;

    

    public static function sendSMSAfterOrderPay($code)
    {
        $template = 'NeliOrderNotif';
        try {
            $data = [
//                'receptor' => '09128889102',
                'receptor' => '09128889102',
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
                return response()->json(['ok' => true, 'message' => 'notification sent']);
            }

            return response()->json(['ok' => false, 'error' => $body], 500);
        }catch (RequestException $e) {

            dd(config('services.ghasedak.key'));

            dd([
                'message' => $e->getMessage(),
                'response' => $e->hasResponse()
                    ? (string)$e->getResponse()->getBody()
                    : 'No response from server',

            ]);
        }
    }

}
