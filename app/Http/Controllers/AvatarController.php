<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Avatar;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    //
    public function index(){

        $transactions = auth()->user()->transaction;

        return view('store', [
            'transactions' => $transactions
        ]);
    }

    public function store(){
        return view('storeAvatar', [
            'avatars' => Avatar::all()
        ]);
    }

    public function buy(Request $request){
        // dd($request);
        $avatar = Avatar::find($request->avatar_id);
        $user = User::find($request->user_id);
        $transactions = Transaction::where('user_id', $user->id)->get();

        foreach($transactions as $transaction){
            // kalau user udh pny avatar nya
            if($transaction->avatar->id == $avatar->id){
                return redirect('store')->with('fail', 'udah punya avatarnya');
            }
        }
        if($user->wallet < $avatar->price){
            return redirect('store')->with('fail', 'uang ga cukup');
        }
        else{
            $transaction = new Transaction();
            $transaction->avatar_id = $avatar->id;
            $transaction->user_id = $user->id;

            $transaction->save();

            $user->wallet = $user->wallet - $avatar->price;
            $user->update();

            return redirect('store')->with('success', 'berhasil beli avatar');
        }

    }


    public function topup(Request $request){
        // dd($request);
        $user = User::find(auth()->user()->id);
        $user->wallet = $request->wallet + $user->wallet;
        $user->update();

        return redirect('store')->with('success', 'berhasil topup!');
    }
}
