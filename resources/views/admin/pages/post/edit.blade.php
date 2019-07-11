@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa bài viết
                    <small>Thêm</small>
                </h1>
            </div>
            <div class="col-lg-7">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form method="post" action="admin/post/edit/{{$post->id}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input required="required" value="{{$post->title}}" class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="category">
                            @foreach($list_category as $l)
                                <option @if($l->id == $post->id_category){{"selected"}}@endif value="{{$l->id}}">{{$l->name}}</option>
                            @endforeach
                        <select >
                    </div>
                    <div class="form-group">
                        <label>Ảnh post cũ </label><br>
                        <img src="upload/post/{{$post->image}}" width="200px">
                    </div>
                    <div class="form-group">
                        <label>Ảnh post </label>
                        <input type="file" class="form-group" name="file">
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="content" id="demo" class="ckeditor">{!!$post->content!!}</textarea>
                    </div>
                    <div class="form-group">
                        <button>Sửa</button>
                    </div>
                </form>
                
            </div>
        </div>
    <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>
@endsection