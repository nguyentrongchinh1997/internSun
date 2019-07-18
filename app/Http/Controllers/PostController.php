<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Service\PostService;

class PostController extends Controller
{
    protected $listCategory, $listPost;
    public function __construct(Category $category, Post $listPost){
        $this->listCategory = $category;
        $this->listPost = $listPost;
    }
    
    public function getListPost()
    {
        $data = ["listPost" => $this->listPost->listPost()];
        return view("admin.pages.post.list", $data);
    }

    public function getAddPost()
    {
        $data = ["listCategory" => $this->listCategory->listCategory()];
        return view("admin.pages.post.add", $data);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect("admin/post/list")->with("thongbao", "Xóa bài viết thành công");
    }

    public function getEditPost(Request $request, $id)
    {
        $post = Post::find($id);
        $data = ["post" => $post, "listCategory" => $this->listCategory->listCategory()];
        return view("admin.pages.post.edit", $data);
    }

    public function postEditPost(Request $request, $id)
    {   
        $editPost = new PostService();
        $editPost->editPost($id, $request->all(), $request->file("file"));
        return redirect("admin/post/edit/$id")->with("thongbao", "Sửa bài viết thành công");
    }

    public function postAddPost(PostRequest $request)
    {
        $addPost = new PostService();
        $addPost->create($request->all());
        return redirect("admin/post/add")->with("thongbao", "Thêm bài viết thành công");
    }
}
