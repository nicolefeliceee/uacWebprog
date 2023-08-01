<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Request $request){
        // dd($request);
        $like = new Like;
        $like['user_id'] = $request->user_id;
        $like['target_id'] = $request->target_id;
        $like->save();

        return redirect('home')->with('success', 'liked successful!');
    }

    public function wishlist(){
        $liked = Like::where('user_id', auth()->user()->id)->get();
        $count = 0;
        $liked_id = [];
        $users = User::all();
        foreach($liked as $like){
            $liked_id[$count] = $like->target_id;
            $count++;
        }
        $liked_id = collect($liked_id);
        // dd($liked_id);

        return view('wishlist', [
            'users' => $users,
            'liked_id' => $liked_id
        ]);
    }

    public function friend(){
        // $friend = Like::where('target_id', $user->id)->where('user_id', $target->id)->first();
        $user_id = auth()->user()->id;
        $friends = Like::where('user_id', $user_id)->get();

        $count = 0;
        $friend_id = [];
        foreach($friends as $friend){
            $friend_id[$count] = $friend->target_id;
            $count++;
        }
        $friend_id = collect($friend_id);
        // dd($friend_id);

        $friends = [];
        $count = 0;
        foreach($friend_id as $friend){
            if(Like::where('user_id', $friend)->where('target_id', $user_id)->first() != null){
                $friends[$count] = Like::where('user_id', $friend)->where('target_id', $user_id)->first();
            }
            // dump($friends[$count]);
            $count++;
        }

        $friends = collect($friends);

        $friends_id = [];
        $count = 0;
        foreach($friends as $friend){
            $friends_id[$count] = $friend->user;
            $count++;
        }
        $friends_id = collect($friends_id);

        // dd($friends_id);

        // $temps = Like::where('target_id', $user_id)->get();
        // $count = 0;
        // foreach($temps as $temp){
        //     if()
        // }

        // dd($friend_id);
        return view('friend', [
            'friends' => $friends_id
        ]);
    }
}
