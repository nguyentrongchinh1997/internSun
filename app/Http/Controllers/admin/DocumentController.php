<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Document;
use App\Http\Requests\DocumentRequest;
use App\Http\Service\admin\DocumentService;

class DocumentController extends Controller
{
    protected $listCategory;
    public function __construct(Category $category)
    {
        $this->listCategory = $category;
        
    }
    public function getAddDocument(){
        $category = Category::where("type", 1)->get();
        $data = ["category" => $category];
        return view("admin.pages.document.add", $data);

    }

    public function getListDocument(){
        $document = Document::all();
        $data = ["document" => $document];
        return view("admin.pages.document.list", $data);

    }

    public function postAddDocument(DocumentRequest $request){
        $date = date("Y-m-d H:i:s");
        $addDocument = new DocumentService();
        $result = $addDocument->uploadFileDocument($request->file("document"), $request->file("poster"), changeTitle($request->name)); // mảng kết quả trả về từ service
        $addDocument->create($request->name, $request->dicription, $request->type, $request->price, $request->preview, $request->page, $request->id_category, $result, $date);
        return redirect("admin/document/add")->with("thongbao", "Thêm tài liệu thành công ");
        
    }

    public function getEditDocumentForm($id)
    {
        $olderDocument = Document::find($id);
        $data = ["olderDocument" => $olderDocument, "category" => $this->listCategory->listAllCategory()];
        return view("admin.pages.document.edit", $data);
    }

    public function postEditDocument(DocumentRequest $request, $id)
    {

        $olderDocument = Document::find($id);
        $addDocument = new DocumentService();
        $addDocument->edit($id, $request->name, $request->dicription, $request->type, $request->price, $request->preview, $request->page, $request->id_category, $request->file("document"), $request->file("poster"));
        return redirect("admin/document/edit/$id")->with("thongbao", "Sửa tài liệu thành công ");
    }
}
