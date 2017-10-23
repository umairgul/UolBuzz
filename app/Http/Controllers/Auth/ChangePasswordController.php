<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('auth.passwords.change-password');
  }

  public function updatePassword(Request $request)
  {

    $this->validate($request,[
      'oldPassword'=>'required',
      'newPassword'=>'required|min:6',
    ]);

    $user = User::findorfail(Auth::id());
    $hashPassword = $user->password;

    if(Hash::check($request->oldPassword,$hashPassword)){
      $user->fill([
        'password'=>Hash::make($request->newPassword)
      ])->save();

      $request->session()->flash('success','Password updated succesfully!');
      return redirect()->route('dashboard.index');
    }
    else {
      $request->session()->flash('failure','Password is not updated');
      return back();
    }




  }
}
