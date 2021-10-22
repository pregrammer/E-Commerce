<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $u_details = DB::table('user_details')->select('fullname', 'phoneNumber', 'user_id')->orderBy('created_at', 'desc')->get();

        $uu_details = $u_details->toArray();
        $users_details = array();
        $c = 0;
        foreach ($users as $user) {

            $item_id_list = array_column($uu_details, 'user_id');
            if (in_array($user->id, $item_id_list)) {
                $users_details[] = [$uu_details[$c]->fullname, $uu_details[$c]->phoneNumber];
                $c++;
            }
            else{
                $users_details[] = ['وارد نشده', 'وارد نشده'];
            }

        }

        $comments = Comment::where('active', false)->latest()->paginate(15);

        return view('manager_panel', [
            'products' => $products,
            'weblogs' => $weblogs,
            'messages' => $messages,
            'users' => $users,
            'users_details' => $users_details,
            'comments' => $comments,
        ]);
    }
}
