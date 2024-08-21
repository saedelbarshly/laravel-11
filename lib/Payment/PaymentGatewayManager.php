<?php
namespace Payment;

use Illuminate\Support\Manager;
use Payment\Drivers\PaypalDriver;
use Payment\Drivers\StripeDriver;

class PaymentGatewayManager extends Manager
{
    public function getDefaultDriver()
    {
        return 'default paypal';
    }

    public function createPayPalDriver()
    {
        return new PaypalDriver();
    }

    public function createStripeDriver()
    {
        return new StripeDriver();
    }
}