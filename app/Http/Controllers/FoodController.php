<?php

namespace App\Http\Controllers;

use App\Category;
use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function __construct()
    {
       $this->middleware('Access:posts');
    }

    public function show($id = -1)
    {
        $product = Food::find($id);
        $html = $this->getCategories($product);
        if($id != -1)
        {
            return view('admin.editProduct',compact('html','product'));
        }

        return view('admin.addProduct',compact('html'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'img' => 'mimes:jpg,png,jpeg|max:500kb'
        ]);
        $null = null;
        $html = $this->getCategories($null);
        $product = new Food;
        foreach ($request->except(['_method','_token','img','add_product']) as $key => $value)
            $product->$key = $value;
        $product->restaurant_id = auth()->id();
        $file = $request->file('img');
        if ( $request->hasFile('img') && !is_null($request->img) ) {
            $path = random_int(0 , 99999).time().'_.'.$request->img->getClientOriginalExtension();
            $file->move(public_path('upload') , $path);
            $product->img = $path;
        }
        $product->save();
        return back();
    }

    public function deleteFood($id)
    {
        $p = Food::find($id);
        if(!$p) return back();
        $this->deleteFile('upload/'.$p->img);
        $p->delete();
        return back();
    }

    public function update($id,Request $request)
    {
        $null = null;
        $html = $this->getCategories($null);

        $product = Food::find($id);
        foreach ($request->except(['_method','_token','img','add_product']) as $key => $value)
        {
            if(!empty($value))
                $product->$key = $value;
        }
        $product->save();

        return back();
    }

    public function manageFoods()
    {
        $products = Food::where('restaurant_id',auth()->id())->paginate(10);
        return view('admin.showProduct',compact('products'));
    }

    public function getCategories(&$product)
    {
        $html = '<div class="p-1 lister">';
        $modals = "";
        $categories = Category::where('restaurant_id',auth()->id())->get();
        foreach ($categories as $category)
        {
            $check = ($product && $category->id == $product->category->id) ? 'checked' : '';
            $html .= '<h5><span>+ </span> <input type="radio" name="category_id" '.$check.' value="'.$category->id.'"> <span class="text-info">'.$category->name.'</span><span class="col-5"></span>';
            echo "<br>";
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
    }

    public function deleteFile($file)
    {
        $file = (isset(glob($file)[0])) ? glob($file)[0] : 'nothing';
        if(is_file($file))
            unlink($file);
    }
}
