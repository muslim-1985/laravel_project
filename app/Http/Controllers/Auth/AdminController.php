<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function ShowLoginForm()
    {
        return view('auth.admin-login');
    }

}
