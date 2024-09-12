<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function paypal(){

        $data = [
            "intent" => "CAPTURE",
             "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" =>  route('paypal.cancel')
             ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => 100.00
                    ],
                ]   
            ]
        ];
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->createOrder($data);

        if (isset($response['id']) & $response['id'] != null) {
  
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
  
          } else {
            return redirect()->route('paypal.cancel');
        }
    }


    public function success(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            dd('success payment');
        } else {
            return redirect()->route('paypal.cancel');
        }
    }
    public function cancel(){
        dd('You are cancelled this payment');
    }
}
