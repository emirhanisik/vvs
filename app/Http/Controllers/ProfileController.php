<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('profile.index')->with('posts', $user->posts);
        
    }

    
}
