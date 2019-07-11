<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
class PostController extends Controller
{
    //

    public function getListPost(){
    	$list_post = Post::all();
    	$data = ["list_post"=>$list_post];
    	return view("admin.pages.post.list", $data);
    }

    public function getAddPost(){
    	$list_category = Category::where("type", 0)->get();
    	$data = ["list_category"=>$list_category];
    	return view("admin.pages.post.add", $data);
    }

    public function deletePost($id){
    	$post = Post::find($id);
    	$post->delete();
    	return redirect("admin/post/list")->with("thongbao", "Xóa bài viết thành công");
    }

    public function getEditPost(Request $request, $id){
    	$list_category = Category::where("type", 0)->get();
    	$post = Post::find($id);
    	$data = ["post"=>$post, "list_category"=>$list_category];
    	return view("admin.pages.post.edit", $data);
    }

    public function postEditPost(Request $request, $id){
    	$post = Post::find($id);
    	$image = $post->image;
    	$id_category = $request->category;
    	$content	 = $request->content;
    	$title		 = $request->title;
    	$unsigned	 = changeTitle($request->title);
    	$date 		 = date("Y-m-d H:i:s");
    	$post->title 			= $title;
    	$post->unsigned_title 	= $unsigned;
    	$post->content 			= $content;
    	$post->date 			= $date;
    	$post->id_category		= $id_category;
    	if($request ->hasFile('file')){
            $file = $request ->file('file'); // Lưu hình vào biến file
            $duoi =$file ->getClientOriginalExtension();
            $name_up = $file ->getClientOriginalName(); //Lấy tên hình ảnh
            $upload =str_random(4)."_". $name_up; //Lấy ramdom 4 ký tự nối với tên ảnh để tránh tên ảnh giống nhau
            $file->move("upload/post",$upload); //Lưu hình
        }
        else{
        	$upload = $image;
        }

        $post->image = $upload;
        $post->save();

        return redirect("admin/post/edit/$id")->with("thongbao", "Sửa bài viết thành công");

    }

    public function postAddPost(Request $request){
    	$id_category = $request->category;
    	$content	 = $request->content;
    	$title		 = $request->title;
    	$unsigned	 = changeTitle($request->title);
    	$date 		 = date("Y-m-d H:i:s");
    	$post = new Post;
    	$post->title 			= $title;
    	$post->unsigned_title 	= $unsigned;
    	$post->content 			= $content;
    	$post->date 			= $date;
    	$post->id_category		= $id_category;
    	if($request ->hasFile('file')){
            $file = $request ->file('file'); // Lưu hình vào biến file
            $duoi =$file ->getClientOriginalExtension();
            $name_up = $file ->getClientOriginalName(); //Lấy tên hình ảnh
            $upload =str_random(4)."_". $name_up; //Lấy ramdom 4 ký tự nối với tên ảnh để tránh tên ảnh giống nhau
            $file->move("upload/post",$upload); //Lưu hình
        }
        else{
        	$upload = '';
        }

        $post->image = $upload;
        $post->save();

        return redirect("admin/post/add")->with("thongbao", "Thêm bài viết thành công");



    }
}
