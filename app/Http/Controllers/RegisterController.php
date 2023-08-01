<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }

    public function store(Request $request){

        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'instagram' => 'required|regex:/^http:\/\/www\.instagram\.com\/[a-zA-Z0-9._]+$/',
            'phone' => 'required|numeric',
            'hobby1' => 'required',
            'hobby2' => 'required',
            'hobby3' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'image' => 'required|file|image'
        ]);

        $validatedData['image'] = $request->file('image')->store('users');
        $validatedData['password'] = bcrypt($validatedData['password']);

        // // dd($validatedData);
        User::create($validatedData);

        $user = User::where('email', $request->email)->get();
        $user_id = User::find($user)->first()->id;
        // dd($user_id);

        // return redirect('payment/' . $user_id);

        return redirect('/login')->with('success', 'Register successful!');
    }
}
