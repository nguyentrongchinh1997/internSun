<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Service\CategoryService;

class CategoryController extends Controller
{
    /*hàm khởi tạo*/
    protected $listCategory;
    public function __construct(Category $category)
    {
        $this->listCategory = $category;
    }
    /*end*/

    /*trả về danh sách chuyên mục*/
    public function getListCategoryForm()
    {
        $data = ["listCategory"=>$this->listCategory->listAllCategory()];
        return view("admin.pages.category.list", $data);
    }
    /*end*/

    /*trả về form thêm chuyên mục*/
    public function getAddCategoryForm()
    {
        return view("admin.pages.category.add");    
    }
    /*end*/

    /*thực hiện thêm chuyên mục*/
    public function postAddCategory(CategoryRequest $request)
    {
        $postAddCategory = new CategoryService;
        $postAddCategory->create($request->all());
        return redirect("admin/category/add")->with("thongbao", "Thêm chuyên mục thành công");
    }
    /*end*/

    /*thực hiện chức năng xóa chuyên mục*/
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect("admin/category/list")->with("thongbao", "Xóa chuyên mục thành công");
    }
    /*end*/

    /*trả về form sửa chuyên mục*/
    public function getEditCategory($id)
    {
        $category = Category::find($id);
        $data = ["category" => $category];
        return view("admin.pages.category.edit", $data);
    }
    /*end*/

    /*chức năng thêm sửa chuyên mục*/
    public function postEditCategory(CategoryRequest $request, $id)
    {
        $editCategory = new CategoryService;
        $editCategory->edit($id, $request->all());
        return redirect("admin/category/edit/$id")->with("thongbao", "Sửa chuyên mục thành công");
    }
    /*end*/
}
