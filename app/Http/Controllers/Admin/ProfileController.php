<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(){

        $user = auth()->user();

        return view('admin.profile', compact('user'));

    }
    public function update(){

        $userData = request()->get('user');
        $profile = request()->get('profile');

        if($userData['password']){
            $userData['password'] = bcrypt($userData['password']);
        } else {
            unset($userData['password']);
        }

        $user = auth()->user();
        $user->update($userData);

        $user->profile()->update($profile);

        return redirect()->route('admin.profile.edit');


    }
}
