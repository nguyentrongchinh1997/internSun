@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyên mục
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
                <form method="post" action="admin/category/add">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên chuyên mục</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Loại chuyên mục</label>
                        <select class="form-control" name="type">
                            <option value="0">Bài viết</option>
                            <option value="1">Tài liệu tải</option>
                            <option value="2">Thi thử</option>
                        <select >
                    </div>
                    <div class="form-group">
                        <button>Thêm</button>
                    </div>
                </form>
                
            </div>
        </div>
    <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>
@endsection