<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show()
    {
        $html = $this->getCategories();
        $category = Category::all();
        return view('admin.category',compact('html','category'));
    }

    public function add()
    {
        $message = null;
        $errors  = null;
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $mainCategory = new Category;
        $mainCategory->name = $name;
        $mainCategory->res  = '-1';
        $mainCategory->save();
        $errors = $mainCategory->errors->all();
        if(!empty($errors))
            $message = "مشکلی در اضافه کردن رخ داده است.";
        else
            $message = "موضوع مورد نظر با موفقیت اضافه گردید";

        return view('admin.category',compact('errors','message'));
    }

    public function update()
    {
        $main = Category::findById($_POST['id'])[0];
        $main->name = $_POST['name'];
        $main->save();
        $this->show();
    }

    public function mainDelete($id)
    {
        if(isset(Category::findById($id)[0])) {
            $main = Category::findById($id)[0];
            $res = $main->delete();
            $message = "موضوع مورد نظر همراه زیر موضوع ها حذف گردید";
            if (!$res)
                $message = "مشکلی در حذف رخ داده است.";
        }else{
            $message = "مشکلی در حذف رخ داده است.";
        }

        return view('admin.category',compact('message'));
    }

    public function getCategories()
    {
        $html = '<div class="p-1 lister">';
        $modals = "";
        $categories = Category::findByRes('-1');
        foreach ($categories as $category)
        {
            $html .= '<h5><span>+ </span><span class="text-info">'.$category->name.'</span><span class="col-5"></span><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal'.$category->id.'">ویرایش</button><span class="col-5"></span><a href="'.url('admin/category/delete/').$category->id.'"class="btn btn-danger">حذف</a></h5><div class="px-3">';
            $modals .= $this->createModal($category->id,1);
            echo "<br>";
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= $modals;
        return $html;
    }

    public function createModal($id,$main = 0)
    {
        $sub = "";
        if(!$main)
            $sub = "sub";
        return $modal = '
        <div class="modal" id="'.$sub.'modal'.$id.'" style="z-index: 2000;">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="'.url('admin/category').'" method="post">
              <input type="hidden" name="_method" value="PATCH" >
              <input type="hidden" name="main" value="'.$main.'" >
              <input type="hidden" name="id" value="'.$id.'" >
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
}
