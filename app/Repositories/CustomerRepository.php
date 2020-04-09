<?php


namespace App\Repositories;


use App\Customer;
use App\Post;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all(){
        return Customer::where('active', 1)
            ->orderBy('name')
            ->with('user')
            ->get()
            ->map(function($customer){
                return[
                    'customer_id' => $customer->id,
                    'name' => $customer->name,
                    'email' => $customer->user->email
                ];
            });
    }
    protected function format($customer){
        return[
            'customer_id' => $customer->id,
            'name' => $customer->name,
            'email' => $customer->user->email
        ];
    }
    public function findById($id){
         $customer = Customer::where('id', $id)
            ->with('user')
            ->firstOrFail();
//            ->map(function($customer){
//                return $this->format($customer);
//            });
          return $this->format($customer);
    }
    public function update($id){

        $customer = Customer::where('id', $id)->firstOrFail();
        $customer->update(request()->only('name'));

    }
    public function delete($id){
        $customer = Customer::where('id', $id)->delete();
    }
}
