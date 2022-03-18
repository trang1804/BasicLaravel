<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getDanhSach()
    {
        $category = Category::all();
        return view('admin.category.list',['category'=>$category]);
    }

    public function getSua($id)
    {
        $category = Category::find($id);
        return view('admin/category/edit',['category'=>$category]);
    }

    public function postSua(Request $request,$id)
    { 
        $this->validate($request,[
            'name' => 'required|unique:categories,category_name|min:3|max:100'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.min' => 'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'name.max' => 'Tên danh mục phải có độ dài từ 3 đến 100 ký tự'
        ]);

        $category = Category::find($id);
        $category->category_name = $request->name;
        $category->save();
        return redirect('admin/category/edit/'.$id)->with('thongbao','Sửa thành công!!!!');
    }

    public function getThem()
    {
        return view('admin.category.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtCateName'=>'required|min:3|max:100|unique:categories,category_name'
        ],
        [
            'txtCateName.required'=>'Bạn chưa nhập tên danh mục',
            'txtCateName.unique' => 'Tên danh mục không được trùng',
            'txtCateName.min'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'txtCateName.max'=>'Tên danh mục phải có độ dài từ 3 đến 100 ký tự'
        ]);

        $category = new Category;
        $category->category_name = $request->txtCateName;
        $category->save();
        return redirect('admin/category/add')->with('thongbao','Thêm thành công!!!');
    }

}
