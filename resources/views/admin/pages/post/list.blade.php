@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài viết 
                    <small>Danh sách</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Tiêu đề không dấu</th>
                        <th>Chuyên mục</th>
                        <th>Ngày đăng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                    @php $stt = 0; @endphp
                    @foreach($listPost as $l)
                        <tr>
                            <td>{{++$stt}}</td>
                            <td>
                                <a href="admin/post/edit/{{$l->id}}">
                                    {{$l->title}}
                                </a>
                                
                            </td>
                            <td>
                                {{$l->unsigned_title}}
                            </td>
                            <td>
                                {{$l->category->name}}
                            </td>
                            <td>
                                {{$l->date}}
                            </td>
                            
                            <td>
                                <a onclick="return xoa()" href="admin/post/delete/{{$l->id}}">
                                    Xóa 
                                </a>
                            </td>
                            <script type="text/javascript">
                                function xoa(){
                                    if(confirm("Bạn có chắc chắn muốn xóa bài viết này không ?")){
                                        return true;
                                    }
                                    else{
                                        return false;
                                    }
                                }
                            </script>
                        </tr>
                    @endforeach 
                
            <tbody>
            
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection