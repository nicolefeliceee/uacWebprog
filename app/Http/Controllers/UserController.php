<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function index(){
        // if(auth()->user()){
        //     $users = User::where('id', '!=', auth()->user()->id)->get();
        // }
        // else{
        //     $users = User::all();
        // }

        $users = User::all();


        // dd(auth()->user());
        if(auth()->user()){
            $users = User::where('id', '!=', auth()->user()->id)->get();

            if(request('search')){
                // $users = User::where('hobby1','like','%'.request('search').'%')->orWhere('hobby2','like','%'.request('search').'%')->orWhere('hobby3','like','%'.request('search').'%')->orWhere('name','like','%'.request('search').'%')->where('id', '!=', auth()->user()->id)->get();
                $users = User::where('name','like','%'.request('search').'%')
                ->Where('id', '!=', auth()->user()->id)->get();
            }
            if(request('category')){
                $users = User::where('gender', request('category'))->where('id', '!=', auth()->user()->id)->get();
            }
            // $users = User::all();
            // $users = $users->where('id', '!=', auth()->user()->id);
        }
        else{
            if(request('search')){
                $users = User::where('name','like','%'.request('search').'%')
                ->get();
                // $users = User::where('hobby1','like','%'.request('search').'%')->where('hobby2','like','%'.request('search').'%')->where('hobby3','like','%'.request('search').'%')->get();
            }

            if(request('category')){
                $users = User::where('gender', request('category'))->get();
            }
        }

        // $users = $users->get();

        // dd($users);

        // ini buat ambil yg usernya like
        $liked = auth()->user()->like;

        $liked_id = [];
        $count = 0;

        // masukin id yg user like ke 1 array
        foreach($liked as $like){
            $liked_id[$count] = $like->target_id;
            $count++;
        }
        $liked_id = collect($liked_id);

        return view('home', [
            'users' => $users,
            'liked_id' => $liked_id
        ]);

    }

    public function profile(){
        return view('profile', [
            'user' => auth()->user()
        ]);
    }

    public function editProfile(){
        return view('edit-profile', [
            'user' => auth()->user()
        ]);
    }

    public function updateProfile(Request $request){
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            Storage::delete($request->oldImage);
            $data['image'] = $request->file('image')->store('users');
        }

        $user = User::find($request->user_id);
        $user->update($data);

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }
}
