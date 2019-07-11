<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Document;
class DocumentController extends Controller
{
    //

    public function getAddDocument(){
    	$category = Category::where("type", 1)->get();
    	$data = ["category"=>$category];
    	return view("admin.pages.document.add", $data);
    }

    public function getListDocument(){
    	$document = Document::all();
    	$data = ["document"=>$document];
    	return view("admin.pages.document.list", $data);
    }

    public function postAddDocument(Request $request){
    	$document = new Document;
    	$document->name 		 = $request->name;
    	$document->unsigned_name = changeTitle($request->name);
    	$document->dicription	 = $request->dicription;
    	$document->type 		 = $request->type;
    	if($request->type == 1){
    		$document->price 		 = $request->price;
    		$document->preview 		 = $request->preview;
    	}
    	if($request ->hasFile('file')){
            $file = $request ->file('file'); // Lưu hình vào biến file
            $duoi =$file ->getClientOriginalExtension();
            $name_up = $file ->getClientOriginalName(); //Lấy tên hình ảnh
            $upload =str_random(4)."_". $name_up; //Lấy ramdom 4 ký tự nối với tên ảnh để tránh tên ảnh giống nhau
            $file->move("upload/document",$upload); //Lưu hình
        }
        else{
        	$upload = '';
        }
        if($request ->hasFile('url_document')){
            $file = $request ->file('url_document'); // Lưu hình vào biến file
            $duoi =$file ->getClientOriginalExtension();
            $name_up = $file ->getClientOriginalName(); //Lấy tên hình ảnh
            $url_document =str_random(4)."_". $name_up; //Lấy ramdom 4 ký tự nối với tên ảnh để tránh tên ảnh giống nhau
            $file->move("upload/document",$url_document); //Lưu hình
        }
        else{
        	$url_document = '';
        }
        $document->url_document  = $url_document;
        $document->image 		 = $upload;
        $document->format 		 = $duoi;
    	
    	$document->page 		 = $request->page;
    	$document->id_category   = $request->id_category;
    	$document->save();
    	return redirect("admin/document/add")->with("thongbao", "Thêm tài liệu thành công ");
    }
}
