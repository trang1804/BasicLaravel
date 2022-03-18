<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function getDanhSach()
    {
        $item = Item::paginate();
        return view('admin.item.list',['item'=>$item]);
    }

    public function getSua($id)
    {
        $item = Item::find($id);
        $user = User::all();
        $category = Category::all();
        return view('admin/item/edit',['item'=>$item,'user'=>$user,'category'=>$category]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'txtName' => 'required|unique:categories,category_name|min:3|max:100'
        ],
        [
            'txtName.required' => 'Bạn chưa nhập tên danh mục',
            'txtName.unique' => 'Tên danh mục không được trùng',
            'txtName.min' => 'Tên danh mục phải có độ dài từ 3 đến 100 ký tự',
            'txtName.max' => 'Tên danh mục phải có độ dài từ 3 đến 100 ký tự'
        ]);

        $item = Item::find($id);
        $item->item_name = $request->txtName;
        $item->price = $request->txtPrice;
        $item->user_id = $request->user;
        $item->category_id = $request->category;
        $item->save();
        return redirect('admin/item/edit/'.$id)->with('thongbao','Sửa thành công!!!!');
    }

    public function getThem()
    {
        $category = Category::all();
        $user = User::all();
        return view('admin/item/add',['category'=>$category,'user'=>$user]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtName' => 'required|min:3|max:100|unique:categories,category_name',
            'txtPrice' => 'required'
        ],
        [
            'txtName.required'=>'Bạn chưa nhập tên sản phẩm',
            'txtName.unique' => 'Tên sản phẩm không được trùng',
            'txtName.min'=>'Tên sản phẩm phải có độ dài từ 3 đến 100 ký tự',
            'txtName.max'=>'Tên sản phẩm phải có độ dài từ 3 đến 100 ký tự',
            'txtPrice.required'=>'Bạn chưa nhập giá sản phẩm'
        ]);

        $item = new Item;
        $item->item_name = $request->txtName;
        $item->price = $request->txtPrice;
        $item->user_id = $request->user;
        $item->category_id = $request->category;
        $item->save();

        return redirect('admin/item/add')->with('thongbao','Thêm thành công!!!');
    }

    public function getXoa($id)
    {
        $item = Item::find($id);
        $item->delete();
        
        return redirect('admin/item/list')->with('thongbao','Xóa thành công!!!');
    }

    public function postSearch(Request $request)
    {
        $key = $request->key;
        $item = Item::where('item_name', 'LIKE', '%' . $key . '%')
        ->orWhere('price','LIKE','%' . $key . '%')
        ->orWhere('user_id','LIKE','%' . $key . '%')
        ->orWhere('category_id','LIKE','%' . $key . '%')
        ->paginate();        
        return view('admin/item/search',['item'=>$item,'key'=>$key]);
    }
}
