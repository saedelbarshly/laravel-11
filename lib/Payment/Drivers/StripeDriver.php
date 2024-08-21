<?php
namespace Payment\Drivers;

use Payment\Drivers\PaymentDriverContract;

class StripeDriver implements PaymentDriverContract
{
    public function pay($amount)
    {
        dump('Stipe Methods');
    }
    public function refund($amount)
    {
        dump('Stipe refund');
    }
}