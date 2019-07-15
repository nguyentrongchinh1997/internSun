<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    // category
    public function getListCategory(){
    	$list_category = Category::all();
    	$data = ["list_category"=>$list_category];
    	return view("admin.pages.category.list", $data);
    }

    public function getAddCategory(){
    	return view("admin.pages.category.add");	
    }

    public function postAddCategory(Request $request){
    	$name 			= $request->name;
    	$unsigned_name 	= changeTitle($request->name);
    	$type 			= $request->type;
    	$category 		= new Category;
    	$category->name = $name;
    	$category->unsigned_name = $unsigned_name;
    	$category->type = $type;
    	$category->save();
    	return redirect("admin/category/add")->with("thongbao", "Thêm chuyên mục thành công");

    }

    public function deleteCategory($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect("admin/category/list")->with("thongbao", "Xóa chuyên mục thành công");
    }

    public function getEditCategory($id){
    	$category = Category::find($id);
    	$data = ["category"=>$category];
    	return view("admin.pages.category.edit", $data);
    }
    public function postEditCategory(Request $request, $id){
    	$name 			= $request->name;
    	$unsigned_name 	= changeTitle($request->name);
    	$type 			= $request->type;
    	$category 		= Category::find($id);
    	$category->name = $name;
    	$category->unsigned_name = $unsigned_name;
    	$category->type = $type;
    	$category->save();
    	return redirect("admin/category/edit/$id")->with("thongbao", "Sửa chuyên mục thành công");

    }

    
}
