<?php


namespace App;


use Illuminate\Support\Facades\Mail;

class PostcardSendingService
{

    private $country;
    private $weight;
    private $height;

    public function __construct($country, $weight, $height)
    {

        $this->country = $country;
        $this->weight = $weight;
        $this->height = $height;
    }
    public function hello($message, $email){

//        Mail::raw($message, function($message) use ($email){
//            $message->to($email);
//        });

        // use class properties
        // send postcard by some service
        dump('Postcard has been send with message: '.$message);
    }
}
