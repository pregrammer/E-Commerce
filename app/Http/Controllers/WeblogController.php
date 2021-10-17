<?php

namespace App\Http\Controllers;

use App\Models\Weblog;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class WeblogController extends Controller
{
    public function indexd($wid)
    {
        $weblog = Weblog::find($wid);
        $suggestion_weblogs = Weblog::select('id','title')->where('groupKind', $weblog->groupKind)->where('id', '<>', $wid)->take(10)->get();
        Weblog::where('id', $wid)->increment('hit');

        return view('weblog_detail',[
            'weblog' => $weblog,
            'suggestion_weblogs' => $suggestion_weblogs
        ]);
    }

    public function store(Request $request)
    {

        $weblog = Weblog::create([
            'title' => $request->title,
            'groupKind' => $request->groupKind,
            'image' => $request->title . '.' . $request->image->extension(),
            'description' => $request->description,
            ]);

        $request->image->move(public_path('images/weblogs'), $weblog->image);

        return redirect('/manager-panel')->with('status', 'مطلب مورد نظر با موفقیت اضافه شد!');
    }

    /////////////////////////////////

    public function indexs()
    {
        $weblogs = Weblog::paginate(8);
        $weblogs_count = array();
        for ($i=1; $i<7; $i++){
            $weblogs_count[] = Weblog::where('groupKind', $i)->count();
        }

        $isall = true;
        return view('weblogs',[
            'weblogs' => $weblogs,
            'weblogs_count' => $weblogs_count,
            'isall' => $isall
        ]);
    }

    public function indexss($gk)
    {
        $gk_weblogs = Weblog::where('groupKind', $gk)->paginate(8);
        $weblogs_count = array();
        for ($i=1; $i<7; $i++){
            $weblogs_count[] = Weblog::where('groupKind', $i)->count();
        }
        $weblog_gk_name = "";
        switch ($gk) {
            case 1:
                $weblog_gk_name = "مایعات ، عرقیجات و روغن ها";
                break;
            
            case 2:
                $weblog_gk_name = "گیاهان ، ادویه ها و خشکبار";
                break;
            case 3:
                $weblog_gk_name = "دمنوش ، چای و قهوه";
                break;
                
            case 4:
                $weblog_gk_name = "محصولات خانگی";
                break;
            case 5:
                $weblog_gk_name = "مواد بهداشتی";
                break;
                    
            case 6:
                $weblog_gk_name = "سایر";
                break;
        }

        $isall = false;
        return view('weblogs',[
            'gk_weblogs' => $gk_weblogs,
            'weblogs_count' => $weblogs_count,
            'isall' => $isall,
            'weblog_gk_name' => $weblog_gk_name,
            'weblog_gk_code' => $gk,
        ]);
    }

    public function get_weblog_by_id($wid)
    {
        $weblog = Weblog::find($wid);
        return response()->json([
            'title' => $weblog->title,
            'groupKind' => $weblog->groupKind,
            'description' => $weblog->description
        ]);
    }
    public function edit(Request $request, $wid)
    {

        $weblog = Weblog::find($wid);
        $weblog->title = $request->title;
        $weblog->groupKind = $request->groupKind;
        $weblog->description = $request->description;

        if ($request->hasFile('image')) {
            File::delete(public_path('images/weblogs/' . $weblog->image));
            $image = $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/weblogs'), $image);
            $weblog->image = $image;
        } else {
            $infoPath = pathinfo(public_path('images/weblogs/' . $weblog->image));
            $extension = $infoPath['extension'];
            $image = $request->title . '.' . $extension;
            rename(public_path('images/weblogs/' . $weblog->image), public_path('images/weblogs/' . $image));
            $weblog->image = $image;
        }

        $weblog->save();

        return redirect('/manager-panel')->with('status', 'مطلب مورد نظر با موفقیت ویرایش شد!');
    }

    public function delete($wid)
    {

        $weblog = Weblog::find($wid);
        File::delete(public_path('images/weblogs/' . $weblog->image));
        $weblog->delete();

        return redirect('/manager-panel')->with('status', 'مطلب مورد نظر با موفقیت حذف شد!');
    }

}
