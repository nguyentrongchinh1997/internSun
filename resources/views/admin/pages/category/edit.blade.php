@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyên mục
                    <small>Chi tiết </small>
                </h1>
            </div>
            <div class="col-lg-7">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form method="post" action="admin/category/edit/{{$category->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên chuyên mục</label>
                        <input required="required" value="{{$category->name}}" class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Loại chuyên mục</label>
                        <select class="form-control" name="type">
                            <option @if($category->type == 0){{"selected"}}@endif value="0">Bài viết</option>
                            <option @if($category->type == 1){{"selected"}}@endif value="1">Tài liệu tải</option>
                            <option @if($category->type == 2){{"selected"}}@endif value="2">Thi thử</option>
                            
                        <select >
                    </div>
                    <div class="form-group">
                        <button type="submit">Sửa</button>
                        <a href="admin/category/list">Quay lại </a>
                    </div>
                </form>
                
            </div>
        </div>
    <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>
@endsection