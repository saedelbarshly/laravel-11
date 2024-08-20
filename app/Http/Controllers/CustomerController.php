<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Jobs\CustomerJob;
use Illuminate\Http\Request;
use App\Mail\CustomerMailable;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index()
    {
       $data = Customer::limit(10)->get();
       foreach ($data as $customer) {
        Mail::to($customer->email)->send(new CustomerMailable());
        sleep(1);
    }
    //    dispatch(new CustomerJob($data));
       return "Email will send to customer";
    }
}
