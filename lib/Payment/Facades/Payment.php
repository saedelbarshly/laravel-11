<?php
namespace Payment\Facades;

use Illuminate\Support\Facades\Facade;
use Payment\PaymentGatewayManager;

/**
 * @method static PaymentDriverContract driver(string $key) 
 * @see PaymentGatewayManager
 */

class Payment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PaymentGatewayManager::class;
    }
}