<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //перед тем как настраивать кастомный гард идем в config/auth.php и там добавляем гард (ориентируемся по комментариям)
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['Logout']);
    }
    //показываем форму авторизации
    public function ShowLoginForm()
    {
        return view('auth.admin-login');
    }
    //принимаем данные из формы и сверяем их с данными в БД в таблице admin
    public function Login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4',
        ]);
        if(\Auth::guard('admin')->attempt([
                                                   'email'=>$request->input('email'),
                                                   'password'=>$request->input('password')
                                                 ],
                                                   $request->remember))
        {
            return redirect()->intended(route('home.user'));
        }
        return redirect()->back();
    }
    //разлогиниться
    //незабываем настроить так же стандартный контроллер с 'web' гардом:LoginController и прописать root
    public function Logout ()
    {
        \Auth::guard('admin')->logout();

        return redirect('/');
    }
    //далее следует настроить middleware
    // первый файл путь: App/Extentios/Handler.php
    //второй файл путь: App/Http/Middleware/RedirectAuthenticated.php
}
