@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài liệu
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
                <form method="post" action="admin/document/add" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên tài liệu</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Loại tài liệu</label>
                        <select class="form-control" id="type" name="type">
                            <option value="0">Miễn phí</option>
                            <option value="1">Trả phí</option>
                        <select >
                    </div>
                    <div class="form-group">
                        <label>Giá tài liệu</label>
                        <input id="price" type="number" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" name="poster">
                    </div>
                    <div>
                        <label>Tài liệu đăng tải</label>
                        <input type="file"  name="document">
                    </div>
                    <div class="form-group">
                        <label>Số trang muốn preview</label>
                        <input id="preview" class="form-control" type="number" name="preview">
                    </div>
                    <div class="form-group">
                        <label>Số trang</label>
                        <input id="number_page" class="form-control" type="number" name="page">
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="id_category">
                            @foreach($category as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        <select >
                    </div>
                    <div class="form-group">
                        <label>Mô tả tài liệu</label>
                        <textarea id="demo" name="dicription" class="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Thêm</button>
                    </div>
                </form>
                <script type="text/javascript">
                    $(document).ready(function(){
                        var type = $("#type").val();
                        if(type == 0){
                            $("#price").attr('disabled', 'disabled');
                            $("#preview").attr('disabled', 'disabled');
                        }

                        $("#type").change(function(){
                            var type = $("#type").val();
                            if(type == 0){
                                $("#price").attr('disabled', 'disabled');
                                $("#preview").attr('disabled', 'disabled');
                            }else{
                                $('#price').removeAttr('disabled');
                                $('#preview').removeAttr('disabled');
                            }
                        })
                    })
                </script>
                
            </div>
        </div>
    <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>
@endsection