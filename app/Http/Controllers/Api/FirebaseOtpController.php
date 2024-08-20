<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

class FirebaseOtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        
        $phone = '+2'.$request->mobile;
        $factory = (new Factory)->withServiceAccount(config('services.firebase'));
        $auth = $factory->createAuth();
        $verificationId = $auth->verifyPhoneNumber($phone)->verificationId;
        dd($verificationId);
    }
}
