<?php

namespace App\Http\Controllers;

use App\Category;
use App\Restaurant;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $html = '<div class="p-1 lister">';
        $modals = "";

        $categories = Restaurant::find(auth()->id())->Categories;
        foreach ($categories as $category) {

            $html .= '<h5><span>+ </span><span class="text-info">' . $category->name . '</span><span class="col-5"></span><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal' . $category->id . '">ویرایش</button><span class="col-5"></span><a href="' . url('manager/category/delete/' . $category->id) . '" class="btn btn-danger">حذف</a></h5><div class="px-3">';
            $modals .= $this->createModal($category->id, 1);
//            echo "<br>";
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= $modals;
        return $html;
    }

    public function createModal($id, $main = 0)
    {
        $sub = "";
        if (!$main)
            $sub = "sub";
        return $modal = '
        <div class="modal" id="' . $sub . 'modal' . $id . '" style="z-index: 2000;">
          <div class="modal-dialog">
            <div class="modal-content">
             <form action="' . url('manager/category') . '" method="post">

            
              
              <input type="hidden" name="_method" value="PATCH" >
              <input type="hidden" name="_token" value="'.csrf_token().'" >
              
              <input type="hidden" name="main" value="' . $main . '" >
              <input type="hidden" name="id" value="' . $id . '" >
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">نام جدید را وارد کنید.</h4>
              </div>
        
              <!-- Modal body -->
              <div class="modal-body">
                <input type="text" class="form-control" name="name" required>
              </div>
        
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                <button type="submit" class="btn btn-primary" name="submit">ویرایش</button>
              </div>
              
              </form>
            </div>
          </div>
        </div>
        ';
    }

    public function show()
    {
        $html = $this->getCategories();
        $category = Category::where('restaurant_id', auth()->id())->get();
        return view('admin.category', compact('html', 'category'));
    }

    public function add(Request $request)
    {
        $message = null;
        $errors = null;
        $name = $request->name ?? null;
        $mainCategory = new Category;
        $mainCategory->name = $name;
        $mainCategory->restaurant_id = auth()->id();
        $mainCategory->save();
//        $errors = $mainCategory->errors->all();
//        if (!empty($errors))
//            $message = "مشکلی در اضافه کردن رخ داده است.";
//        else
//            $message = "موضوع مورد نظر با موفقیت اضافه گردید";

        return back();
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $main = Category::find($id);
        $name = $request->get('name');
        $main->name = $name;
        $main->save();
        return back();
    }

    public function mainDelete($id)
    {
        $category = Category::find($id);
        if (isset($category)) {
            $main = Category::find($id);
            $res = $main->delete();
            $message = "موضوع مورد نظر همراه زیر موضوع ها حذف گردید";
            if (!$res)
                $message = "مشکلی در حذف رخ داده است.";
        } else {
            $message = "مشکلی در حذف رخ داده است.";
        }

        return back();
    }
}