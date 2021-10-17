<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Sliderimage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class sitepropertyController extends Controller
{
    public function change_gallery(Request $request)
    {
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('siteee');
            Sliderimage::create([
                'image' => $path,
                'link' => $request->link,
            ]);
            return redirect('/manager-panel')->with('status', 'عکس مورد نظر با موفقیت به اسلایدر سایت اضافه شد!');
        }
        else{

            if (Sliderimage::count() == 0){
                return redirect('/manager-panel')->with('status', 'عکسی برای حذف از اسلایدر وجود ندارد!');
            }

            $last = Sliderimage::latest()->first();
            Storage::delete($last->image);
            $last->delete();
            return redirect('/manager-panel')->with('status', 'آخرین عکس از اسلایدر با موفقیت حذف شد!');
        }

    }

    public function change_topad(Request $request)
    {
        $ad = Advertisement::first();

        if ($request->hasFile('image')){
            if (Advertisement::count() == 0){
                $path = $request->file('image')->store('siteee');
                Advertisement::create([
                    'topOne' => $path,
                    'topOneLink' => $request->link,
                ]);
                return redirect('/manager-panel')->with('status', 'تبلیغ بالا با موفقیت اضافه شد!');
            }else if($ad->topOne != null){
                return redirect('/manager-panel')->with('status', 'لطفا ابتدا تبلیغ بالای جاری را حذف کنید!');
            }else{
                $path = $request->file('image')->store('siteee');
                $ad->topOne = $path;
                $ad->topOneLink = $request->link;
                $ad->save();
                return redirect('/manager-panel')->with('status', 'تبلیغ بالا با موفقیت اضافه شد!');
            }
        }
        else{

            if (Advertisement::count() == 0 || $ad->topOne == null){
                return redirect('/manager-panel')->with('status', 'عکسی برای حذف از تبلیغ بالا وجود ندارد!');
            }
            Storage::delete($ad->topOne);
            $ad->topOne = null;
            $ad->topOneLink = null;
            $ad->save();
            return redirect('/manager-panel')->with('status', 'تبلیغ بالا با موفقیت حذف شد!');
        }        

    }

    public function change_downad(Request $request)
    {
        $ad = Advertisement::first();

        if ($request->hasFile('image')){
            if (Advertisement::count() == 0){
                $path = $request->file('image')->store('siteee');
                Advertisement::create([
                    'downOne' => $path,
                    'downOneLink' => $request->link,
                ]);
                return redirect('/manager-panel')->with('status', 'تبلیغ پایین با موفقیت اضافه شد!');
            }else if($ad->downOne != null){
                return redirect('/manager-panel')->with('status', 'لطفا ابتدا تبلیغ پایین جاری را حذف کنید!');
            }else{
                $path = $request->file('image')->store('siteee');
                $ad->downOne = $path;
                $ad->downOneLink = $request->link;
                $ad->save();
                return redirect('/manager-panel')->with('status', 'تبلیغ پایین با موفقیت اضافه شد!');
            }
        }
        else{

            if (Advertisement::count() == 0 || $ad->downOne == null){
                return redirect('/manager-panel')->with('status', 'عکسی برای حذف از تبلیغ پایین وجود ندارد!');
            }
            Storage::delete($ad->downOne);
            $ad->downOne = null;
            $ad->downOneLink = null;
            $ad->save();
            return redirect('/manager-panel')->with('status', 'تبلیغ پایین با موفقیت حذف شد!');
        }  

    }

    public function change_fourad(Request $request)
    {
        $ad = Advertisement::first();

        if ($request->hasFile('image')){
            if (Advertisement::count() == 0){
                $path = $request->file('image')->store('siteee');
                Advertisement::create([
                    'firstSquare' => $path,
                    'firstSquareLink' => $request->link,
                ]);
                return redirect('/manager-panel')->with('status', 'اولین تبلیغ با موفقیت اضافه شد!');
            }else if($ad->firstSquare != null && $ad->secondSquare != null && $ad->thirdSquare != null && $ad->fourthSquare != null){
                return redirect('/manager-panel')->with('status', 'برای اضافه کردن تبلیغ جدید ، لطفا ابتدا آخرین تبلیغ را حذف کنید!');
            }else if($ad->firstSquare == null){
                $path = $request->file('image')->store('siteee');
                $ad->firstSquare = $path;
                $ad->firstSquareLink = $request->link;
                $ad->save();
                return redirect('/manager-panel')->with('status', 'تبلیغ اول با موفقیت اضافه شد!');
            }else if($ad->secondSquare == null){
                $path = $request->file('image')->store('siteee');
                $ad->secondSquare = $path;
                $ad->secondSquareLink = $request->link;
                $ad->save();
                return redirect('/manager-panel')->with('status', 'تبلیغ دوم با موفقیت اضافه شد!');
            }else if($ad->thirdSquare == null){
                $path = $request->file('image')->store('siteee');
                $ad->thirdSquare = $path;
                $ad->thirdSquareLink = $request->link;
                $ad->save();
                return redirect('/manager-panel')->with('status', 'تبلیغ سوم با موفقیت اضافه شد!');
            }else if($ad->fourthSquare == null){
                $path = $request->file('image')->store('siteee');
                $ad->fourthSquare = $path;
                $ad->fourthSquareLink = $request->link;
                $ad->save();
                return redirect('/manager-panel')->with('status', 'تبلیغ چهارم با موفقیت اضافه شد!');
            }
        }
        else{

            if (Advertisement::count() == 0 || $ad->firstSquare == null){
                return redirect('/manager-panel')->with('status', 'عکسی برای حذف وجود ندارد!');
            }

            if ($ad->fourthSquare != null){
                Storage::delete($ad->fourthSquare);
                $ad->fourthSquare = null;
                $ad->fourthSquareLink = null;
            }elseif ($ad->thirdSquare != null){
                Storage::delete($ad->thirdSquare);
                $ad->thirdSquare = null;
                $ad->thirdSquareLink = null;
            }elseif ($ad->secondSquare != null){
                Storage::delete($ad->secondSquare);
                $ad->secondSquare = null;
                $ad->secondSquareLink = null;
            }elseif ($ad->firstSquare != null){
                Storage::delete($ad->firstSquare);
                $ad->firstSquare = null;
                $ad->firstSquareLink = null;
            }

            $ad->save();
            return redirect('/manager-panel')->with('status', 'آخرین عکس از چهار تبلیغ با موفقیت حذف شد!');
        }

    }

}
