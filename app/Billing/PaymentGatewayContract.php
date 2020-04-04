<?php

namespace App\Billing;

interface PaymentGatewayContract
{
    public function setDiscount($discount);

    public function charge($amount);
}
