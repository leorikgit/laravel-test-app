<?php

use App\Customer;
use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create()->each(function($user){
            $user->customer()->save(factory(Customer::class)->create());
        });
    }
}
