<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function showProfileForm($id){

        $user = DB::table('users')->where('id','=',$id)->first();
//
//        $dpt = DB::table('departments')->orderBy('department_name','asc')->get();
        return view('profile.showProfile')->with('user',$user);
    }

    public function updateProfile(Request $request, $id){

        $this->validate($request,[
            'password' => 'required|string|min:6'
        ]);

        $user = User::findorfail($id);

        $user->password = Hash::make($request->password);
        $user->save();


        return redirect()->route('dashboard.index');
    }

}
