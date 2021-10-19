<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class useraccountController extends Controller
{

    /*public function __construct()
    {
        $this->middleware(['guest']);
    }*/  //for register or login page (if its out of useraccount page)

    public function index()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $messages = [
            'required' => 'پر کردن این فیلد الزامی است.',
            'max:255' => 'طول متن بزرگتر از حد معمول است.',
            'confirmed' => 'رمز عبور و تکرار آن همخوانی ندارد.',
            'email' => 'لطفا ایمیل را به شکل صحیح وارد کنید.',
            'unique' => 'این ایمیل قبلا استفاده شده است.'
        ];

        Validator::make($request->all(), [
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required|confirmed'
        ],$messages)->validateWithBag('register');

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect('/')->with('status', 'با موفقیت ثبت نام شدید!');

    }

    public function login(Request $request)
    {

        $messages = [
            'required' => 'پر کردن این فیلد الزامی است.',
            'email' => 'لطفا ایمیل را به شکل صحیح وارد کنید.'
        ];

        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ],$messages)->validateWithBag('login');

        /*if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }*/
        dd($request->remember);
        
        if (! Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1], $request->remember))
        {
            return back()->with('status', 'ورود نامعتبر!');
        }

        return redirect('/');

    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function reset_pass(Request $request)
    {

        $messages = [
            'required' => 'پر کردن این فیلد الزامی است.',
            'email' => 'لطفا ایمیل را به شکل صحیح وارد کنید.'
        ];

        Validator::make($request->all(), [
            'email' => 'required|email'
        ],$messages)->validateWithBag('respass');

        dd('complete method reset_pass in useraccountController');

    }

    public function change_user_active($uid)
    {
        $user = User::find($uid);
        $user->active = !$user->active;
        $user->save();
        return redirect('/manager-panel')->with('status', 'وضعیت کاربر با موفقیت تغییر کرد!');
    }

}
