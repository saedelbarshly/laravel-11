<?php
namespace Payment\Drivers;

use Payment\Drivers\PaymentDriverContract;

class PaypalDriver implements PaymentDriverContract
{
    public function pay($amount)
    {
        dump('Paypal Methods');
    }
    public function refund($amount)
    {
        dump('Paypal refund');
    }
}