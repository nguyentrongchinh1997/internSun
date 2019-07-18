@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài Viết
                    <small>Thêm</small>
                </h1>
            </div>
            <div class="col-lg-7">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach    
                </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form method="post" action="admin/post/add" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="category">
                            @foreach($listCategory as $l)
                                <option value="{{$l->id}}">{{$l->name}}</option>
                            @endforeach
                        <select >
                    </div>
                    <div class="form-group">
                        <label>Ảnh post </label>
                        <input type="file" class="form-group" name="file">
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="content" id="demo" class="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Thêm</button>
                    </div>
                </form>
                
            </div>
        </div>
    <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>
@endsection