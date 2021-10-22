<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store_product_comment(Request $request, $pid)
    {
        $messages = [
            'required' => 'پر کردن این فیلد الزامی است.',
            'max:255' => 'طول متن بزرگتر از حد معمول است.',
            'email' => 'لطفا ایمیل را به شکل صحیح وارد کنید.',
        ];

        Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'name' => 'required|max:255',
            'description' => 'required'
        ],$messages)->validateWithBag('comment_errors');

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'product_id' => $pid,
            'weblog_id' => 0
        ]);

        return back()->with('status', 'نظر شما با موفقیت ثبت و پس از تایید ، نمایش داده خواهد شد!');
    }

    public function store_weblog_comment(Request $request, $wid)
    {
        $messages = [
            'required' => 'پر کردن این فیلد الزامی است.',
            'max:255' => 'طول متن بزرگتر از حد معمول است.',
            'email' => 'لطفا ایمیل را به شکل صحیح وارد کنید.',
        ];

        Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'name' => 'required|max:255',
            'description' => 'required'
        ],$messages)->validateWithBag('comment_errors');

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'product_id' => 0,
            'weblog_id' => $wid
        ]);

        return back()->with('status', 'نظر شما با موفقیت ثبت و پس از تایید ، نمایش داده خواهد شد!');
    }
    
    public function delete_comment($cid)
    {
        $comment = Comment::find($cid);
        DB::table('comment_answers')->where('comment_id', $cid)->delete();
        $comment->delete();

        return redirect('/manager-panel')->with('status', 'کامنت مورد نظر با موفقیت حذف شد!');
    }

    public function active_comment($cid)
    {
        $comment = Comment::find($cid);
        $comment->active = true;
        $comment->save();

        return redirect('/manager-panel')->with('status', 'کامنت مورد نظر با موفقیت تایید شد!');
    }

    public function get_comment($cid)
    {
        $comment = Comment::find($cid);
        $comment_answer = DB::table('comment_answers')->where('comment_id', $cid)->select('description')->first();
        if($comment_answer){
            $answer = $comment_answer->description;
            return response()->json([
                'description' => $comment->description,
                'answer' => $answer
            ]);
        }else{
            return response()->json([
                'description' => $comment->description,
                'answer' => ''
            ]);
        }
    }

    public function edit_comment_and_submit_answer(Request $request ,$cid)
    {
        $comment = Comment::find($cid);
        $comment->description = $request->description;

        if($request->answer){
            DB::table('comment_answers')->insert([
                'description' => $request->answer,
                'comment_id' => $cid
            ]);
        }

        $comment->save();

        return redirect('/manager-panel')->with('status', 'کامنت مورد نظر با موفقیت ویرایش شد!');
    }

}
