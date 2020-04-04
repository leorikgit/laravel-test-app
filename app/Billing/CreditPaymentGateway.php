<?php


namespace App\Billing;


use Illuminate\Support\Str;

class CreditPaymentGateway implements PaymentGatewayContract
{
    private $currency,
            $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }
    public function setDiscount($discount){
        $this->discount = $discount;
    }

    public function charge($amount){

        // charge
        $fees = $amount * 0.03;
        return [
            'amount' => ($amount - $this->discount) + $fees,
            'verify_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fees' => $fees
        ];
    }
}
