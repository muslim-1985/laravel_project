<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class RegisterAdminController extends Controller
{
    public function ShowRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function Register(Request $request) {
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'required|min:4',
        ]);
        $user = new Admin();
        $user->name = $request->input ( 'name' );
        $user->email = $request->input ( 'email' );
        $user->password = Hash::make ( $request->input ( 'password' ) );
        $user->remember_token = $request->input ( '_token' );
        $user->save ();
        return redirect ( '/' );
    }
    public function ShowUsers ()
    {
        $users = Admin::with('comments')->get();
        return view('admin.user.index', compact('users'));
    }
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('admin');
    }
}
