<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index($id){
        $price = random_int(100000, 125000);
        // dd($randomNumber);
        return view('payment', [
            'price' => $price,
            'user' => User::find($id)
        ]);
    }
}
