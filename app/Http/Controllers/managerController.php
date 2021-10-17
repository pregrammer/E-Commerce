<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Message;
use App\Models\Product;
use App\Models\User;
use App\Models\Weblog;
use Illuminate\Http\Request;

class managerController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(15);
        $weblogs = Weblog::latest()->paginate(15);
        $messages = Message::latest()->paginate(8);
        $users = User::latest()->paginate(15);
        $users_details = DB::table('user_details')->select('fullname', 'phoneNumber')->orderBy('created_at', 'desc')->get();

        return view('manager_panel', [
            'products' => $products,
            'weblogs' => $weblogs,
            'messages' => $messages,
            'users' => $users,
            'users_details' => $users_details
            ]);

    }

}
