<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Document;
use App\Http\Requests\DocumentRequest;
use App\Http\Service\DocumentService;

class DocumentController extends Controller
{
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
        $addDocument = new DocumentService();
        $result = $addDocument->uploadFileDocument($request->file("document"), $request->file("poster"), changeTitle($request->name)); // mảng kết quả trả về từ service
        $addDocument->create($request->name, $request->dicription, $request->type, $request->price, $request->preview, $request->page, $request->id_category, $result);
        return redirect("admin/document/add")->with("thongbao", "Thêm tài liệu thành công ");
    }
}
