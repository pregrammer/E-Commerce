<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userprofileController extends Controller
{
    public function index()
    {
        $userdetail = DB::table('user_details')->where('user_id', auth()->id())->first();

        if(!$userdetail){
            $userdetail = new User();
        }

        return view('user_profile', ['userdetail' => $userdetail]);
    }

    public function edit_details(Request $request)
    {
        $messages = [
            'required' => 'پر کردن این فیلد الزامی است.',
            'max:255' => 'طول متن بزرگتر از حد معمول است.',
            'email' => 'لطفا ایمیل را به شکل صحیح وارد کنید.',
            'numeric' => 'لطفا عدد وارد کنید'
        ];

        Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'fullname' => 'required|max:255',
            'melliCode' => 'required|numeric',
            'phoneNumber' => 'required|numeric',
            'postalCode' => 'required|numeric',
            'address' => 'required'
        ],$messages)->validateWithBag('detail');

        $userdetail = DB::table('user_details')->where('user_id', auth()->id())->first();

        if(!$userdetail){
            DB::table('user_details')->insert([
                'fullname' => $request->fullname,
                'melliCode' => $request->melliCode,
                'phoneNumber' => $request->phoneNumber,
                'postalCode' => $request->postalCode,
                'address' => $request->address,
                "created_at" =>  \Carbon\Carbon::now(),
                'user_id' => auth()->id()
            ]);
            User::where('id', auth()->id())->update([
                'email' => $request->email
            ]);
        }
        else{
            DB::table('user_details')->where('user_id', auth()->id())->update([
                'fullname' => $request->fullname,
                'melliCode' => $request->melliCode,
                'phoneNumber' => $request->phoneNumber,
                'postalCode' => $request->postalCode,
                'address' => $request->address,
                "updated_at" => \Carbon\Carbon::now(),
            ]);
            User::where('id', auth()->id())->update([
                'email' => $request->email
            ]);
        }

        return redirect('/');
    }

    public function edit_pass(Request $request)
    {
        $messages = [
            'required' => 'پر کردن این فیلد الزامی است.',
            'confirmed' => 'رمز عبور و تکرار آن همخوانی ندارد.',
        ];
        Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ],$messages)->validateWithBag('respass');

        User::where('id', auth()->id())->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/');
    }

}
