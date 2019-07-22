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
                        <th>Hình ảnh</th>
                        <th>Tiêu đề</th>
                        <th>Loại tài liệu</th>
                        <th>Lượt view</th>
                        <th>Lượt tải</th>
                        <th>Gái tài liệu</th>
                        <th>Chuyên mục</th>
                    </tr>
                </thead>
                @php $stt = 0; @endphp
                @foreach($document as $document)
                    <tr>
                        <td>{{++$stt}}</td>
                        <td>
                            <img width="150px" src="upload/document/{{$document->image}}">
                        </td>
                        <td>
                            <a href="admin/document/edit/{{$document->id}}">
                                {{$document->name}}
                            </a>
                            
                        </td>
                        <td>
                            @if($document->type == 0)
                                <span>Miễn phí</span>
                            @else
                                <span>Trả phí </span>
                            @endif
                        </td>
                        <td>
                            @if($document->view == '')
                                <span>0</span>
                            @else
                                <span>{{$document->view}}</span>
                            @endif
                        </td>
                        <td>
                            @if($document->dowload == '')
                                <span>0</span>
                            @else
                                <span>{{$document->dowload}}</span>
                            @endif
                        </td>
                        <td>
                            @if($document->price == '')
                                <span>0</span>
                            @else
                                <span>{{number_format($document->price)}}đ</span>
                            @endif
                        </td>
                        <td>
                            {{$document->category->name}}
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