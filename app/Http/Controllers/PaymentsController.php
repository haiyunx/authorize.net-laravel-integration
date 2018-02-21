<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store(Requests\CreditCardRequest $request)
    {
        

        
        session()->flash('success', 'Success!');
        //return redirect()->route('users.show', [$user]);
        
        return redirect()->route('home');
    }

}
