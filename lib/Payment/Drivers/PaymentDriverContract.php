<?php
namespace Payment\Drivers;

interface PaymentDriverContract
{
    public function pay($amount);

    public function refund($amount);
}