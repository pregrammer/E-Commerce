<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexd($pid)
    {
        $product = Product::find($pid);
        $product_images = DB::table('products_images')->where('product_id', $pid)->first();
        $product_properties = DB::table('products_properties')->where('product_id', $pid)->first();
        $product_features = DB::table('products_features')->where('product_id', $pid)->get();

        $related_products = Product::where('groupKind', $product->groupKind)->where('id', '<>', $pid)->take(10)->get();
        $related_products_images = array();
        foreach ($related_products as $related_product)
        {
            $related_products_images[] = DB::table('products_images')->where('product_id', $related_product->id)->select('firstImage')->first();
        }

        return view('product_detail',[
            'product' => $product,
            'product_images' => $product_images,
            'product_properties' => $product_properties,
            'product_features' => $product_features,
            'related_products' => $related_products,
            'related_products_images' => $related_products_images
        ]);
    }

    public function store(Request $request)
    {

        $product = Product::create([
            'name' => $request->name,
            'groupKind' => $request->groupKind,
            'price' => $request->price,
            'discountPercentage' => $request->discountPercentage,
            'inventory' => $request->inventory,
            'description' => $request->description
        ]);

        $firstImage = $product->name . '1' . '.' . $request->firstImage->extension();
        $request->firstImage->move(public_path('images/products'), $firstImage);

        $secondImage = $product->name . '2' . '.' . $request->secondImage->extension();
        $request->secondImage->move(public_path('images/products'), $secondImage);

        $thirdImage = $product->name . '3' . '.' . $request->thirdImage->extension();
        $request->thirdImage->move(public_path('images/products'), $thirdImage);

        $fourthImage = $product->name . '4' . '.' . $request->fourthImage->extension();
        $request->fourthImage->move(public_path('images/products'), $fourthImage);

        DB::table('products_images')->insert([
            'firstImage' => $firstImage,
            'secondImage' => $secondImage,
            'thirdImage' => $thirdImage,
            'fourthImage' => $fourthImage,
            'product_id' => $product->id
        ]);


        DB::table('products_properties')->insert([
            'firstProp' => $request->firstProp,
            'secondProp' => $request->secondProp,
            'thirdProp' => $request->thirdProp,
            'fourthProp' => $request->fourthProp,
            'fifthProp' => $request->fifthProp,
            'product_id' => $product->id
        ]);

        for ($i = 1; $i < 7; $i++) {
            $title = 'title' . $i;
            $feature = 'feature' . $i;
            DB::table('products_features')->insert([
                'title' => $request->$title,
                'feature' => $request->$feature,
                'product_id' => $product->id
            ]);
        }

        return redirect('/manager-panel')->with('status', 'محصول مورد نظر با موفقیت اضافه شد!');
    }

    /////////////////////////////////////

    public function indexs($gk)
    {
        $products = Product::where('groupKind', $gk)->paginate(12);
        $products_images = array();
        foreach ($products as $product)
        {
            $products_images[] = DB::table('products_images')->where('product_id', $product->id)->select('firstImage')->first();
        }

        return view('products',[
            'products' => $products,
            'products_images' => $products_images,
            'gk' => $gk
        ]);
    }
    public function get_product_by_id($pid)
    {

        $product = Product::find($pid);
        $products_features = DB::table('products_features')->where('product_id', $pid)->get();
        $products_properties = DB::table('products_properties')->where('product_id', $pid)->first();

        return response()->json([
            'name' => $product->name,
            'groupKind' => $product->groupKind,
            'price' => $product->price,
            'discountPercentage' => $product->discountPercentage,
            'inventory' => $product->inventory,
            'description' => $product->description,
            'title1' => $products_features[0]->title,
            'title2' => $products_features[1]->title,
            'title3' => $products_features[2]->title,
            'title4' => $products_features[3]->title,
            'title5' => $products_features[4]->title,
            'title6' => $products_features[5]->title,
            'feature1' => $products_features[0]->feature,
            'feature2' => $products_features[1]->feature,
            'feature3' => $products_features[2]->feature,
            'feature4' => $products_features[3]->feature,
            'feature5' => $products_features[4]->feature,
            'feature6' => $products_features[5]->feature,
            'firstProp' => $products_properties->firstProp,
            'secondProp' => $products_properties->secondProp,
            'thirdProp' => $products_properties->thirdProp,
            'fourthProp' => $products_properties->fourthProp,
            'fifthProp' => $products_properties->fifthProp
        ]);
    }
    public function edit(Request $request, $pid)
    {

        $product = Product::find($pid);
        $product->name = $request->name;
        $product->groupKind = $request->groupKind;
        $product->price = $request->price;
        $product->discountPercentage = $request->discountPercentage;
        $product->inventory = $request->inventory;
        $product->description = $request->description;
        $product->save();

        $products_images = DB::table('products_images')->where('product_id', $pid)->first();
        if ($request->hasFile('firstImage')) {
            File::delete(public_path('images/products/' . $products_images->firstImage));
            $firstImage = $product->name . '1' . '.' . $request->firstImage->extension();
            $request->firstImage->move(public_path('images/products'), $firstImage);
        } else {
            $infoPath = pathinfo(public_path('images/products/' . $products_images->firstImage));
            $extension = $infoPath['extension'];
            $firstImage = $product->name . '1' . '.' . $extension;
            rename(public_path('images/products/' . $products_images->firstImage), public_path('images/products/' . $firstImage));
        }
        if ($request->hasFile('secondImage')) {
            File::delete(public_path('images/products/' . $products_images->secondImage));
            $secondImage = $product->name . '2' . '.' . $request->secondImage->extension();
            $request->secondImage->move(public_path('images/products'), $secondImage);
        } else {
            $infoPath = pathinfo(public_path('images/products/' . $products_images->secondImage));
            $extension = $infoPath['extension'];
            $secondImage = $product->name . '2' . '.' . $extension;
            rename(public_path('images/products/' . $products_images->secondImage), public_path('images/products/' . $secondImage));
        }
        if ($request->hasFile('thirdImage')) {
            File::delete(public_path('images/products/' . $products_images->thirdImage));
            $thirdImage = $product->name . '3' . '.' . $request->thirdImage->extension();
            $request->thirdImage->move(public_path('images/products'), $thirdImage);
        } else {
            $infoPath = pathinfo(public_path('images/products/' . $products_images->thirdImage));
            $extension = $infoPath['extension'];
            $thirdImage = $product->name . '3' . '.' . $extension;
            rename(public_path('images/products/' . $products_images->thirdImage), public_path('images/products/' . $thirdImage));
        }
        if ($request->hasFile('fourthImage')) {
            File::delete(public_path('images/products/' . $products_images->fourthImage));
            $fourthImage = $product->name . '4' . '.' . $request->fourthImage->extension();
            $request->fourthImage->move(public_path('images/products'), $fourthImage);
        } else {
            $infoPath = pathinfo(public_path('images/products/' . $products_images->fourthImage));
            $extension = $infoPath['extension'];
            $fourthImage = $product->name . '4' . '.' . $extension;
            rename(public_path('images/products/' . $products_images->fourthImage), public_path('images/products/' . $fourthImage));
        }
        DB::table('products_images')->where('product_id', $pid)->update([
            'firstImage' => $firstImage,
            'secondImage' => $secondImage,
            'thirdImage' => $thirdImage,
            'fourthImage' => $fourthImage,
        ]);

        DB::table('products_properties')->where('product_id', $pid)->update([
            'firstProp' => $request->firstProp,
            'secondProp' => $request->secondProp,
            'thirdProp' => $request->thirdProp,
            'fourthProp' => $request->fourthProp,
            'fifthProp' => $request->fifthProp,
        ]);

        $products_features_ids = DB::table('products_features')->where('product_id', $pid)->pluck('id');
        for ($i = 1; $i < 7; $i++) {
            $title = 'title' . $i;
            $feature = 'feature' . $i;
            DB::table('products_features')->where('id', $products_features_ids[$i - 1])->update([
                'title' => $request->$title,
                'feature' => $request->$feature,
            ]);
        }

        return redirect('/manager-panel')->with('status', 'محصول مورد نظر با موفقیت ویرایش شد!');
    }

    public function delete($pid)
    {

        $product = Product::find($pid);
        $product->delete();
        DB::table('products_features')->where('product_id', $pid)->delete(); //if you fix on delete cascade, these two rows do not need
        DB::table('products_properties')->where('product_id', $pid)->delete();

        $products_images = DB::table('products_images')->where('product_id', $pid)->first();
        File::delete(public_path('images/products/' . $products_images->firstImage));
        File::delete(public_path('images/products/' . $products_images->secondImage));
        File::delete(public_path('images/products/' . $products_images->thirdImage));
        File::delete(public_path('images/products/' . $products_images->fourthImage));
        DB::table('products_images')->where('product_id', $pid)->delete();

        return redirect('/manager-panel')->with('status', 'محصول مورد نظر با موفقیت حذف شد!');
    }
}
