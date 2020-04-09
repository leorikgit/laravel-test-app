<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryInterface;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index(){

        $customers = $this->customerRepository->all();
        return $customers;


    }
    public function show($customerId){

        $post = $this->customerRepository->findById($customerId);
        return $post;
    }
    public function update($id){
        $this->customerRepository->update($id);
        return redirect('/customers/'.$id);
    }
    public function destroy($id){
        $this->customerRepository->delete($id);
        return redirect('/customers/');
    }

}
