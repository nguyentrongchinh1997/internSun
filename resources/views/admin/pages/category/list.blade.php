@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyên mục
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
                        <th>Tên chuyên mục</th>
                        <th>Tên không dấu</th>
                        <th>Loại chuyên mục</th>
                        
                        <th>Xóa</th>
                    </tr>
                </thead>
                @php $stt = 0; @endphp
                @foreach($listCategory as $category)
                    <tr>
                        <td>{{++$stt}}</td>
                        <td>
                            <a href="admin/category/edit/{{$category->id}}">
                                {{$category->name}}
                            </a>
                            
                        </td>
                        <td>
                            {{$category->unsigned_name}}
                        </td>
                        <td>
                            @if($category->type == 1)
                                <span>Tài liệu tải</span>
                            @elseif($category->type==2)
                                <span>Thi thử</span>
                            @else
                                <span>Bài viết</span>
                            @endif
                        </td>
                       
                        <td>
                            <center>
                                <a onclick="return xoa()" href="admin/category/delete/{{$category->id}}">Xóa</a>
                            </center>
                            
                        </td>
                        <script type="text/javascript">
                            function xoa(){
                                if(confirm("Bạn có chắc chắn muốn xóa chuyên mục này?")){
                                    return true;
                                }else{
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