<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'پر کردن این فیلد الزامی است.',
            'max:255' => 'طول متن بزرگتر از حد معمول است.',
            'email' => 'لطفا ایمیل را به شکل صحیح وارد کنید.',
            'numeric' => 'لطفا عدد وارد کنید.'
        ];

        Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'phoneNumber' => 'required|numeric',
            'description' => 'required'
        ],$messages)->validateWithBag('message');

        Message::create([
            'title' => $request->title,
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'description' => $request->description
        ]);

        Session::put('success-register', 'پیام شما با موفقیت ارسال شد!');

        return redirect('/');
    }
}
