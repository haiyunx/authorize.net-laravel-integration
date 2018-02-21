<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }
}
