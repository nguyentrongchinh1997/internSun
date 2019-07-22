@extends("client.layout.index")
@section("content")
<div class="row" id="slide">

    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

          <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="image/banner.png" alt="..." width="100%">
                    <div class="carousel-caption">
                        
                    </div>
                </div>
                <div class="item">
                    <img src="image/banner1.png" alt="..." width="100%">
                    <div class="carousel-caption">
                    
                    </div>
                </div>
            
            </div>

          <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
    </div>

    
</div>
<br>
<div class="row" id="content">
    <div class="container">
    <!-- Tài liệu mới nhất -->
        <div class="row">
            <div class="col-lg-12" style="padding: 0px">
                <h1>
                    <i class="fas fa-file-alt" style="color: #4d81ed"></i> Tài liệu mới
                    <span style="float: right; font-size: 20px; margin-top: 15px"><a href="#">» Xem tất cả</a></span>
                </h1><hr>
            </div>
        </div>  
        
        <div class="row" style="background: #fff; padding: 15px 8px; border: 1px solid #e5e5e5">
            @foreach ($documentNew as $document)
                <div class="col-lg-2 list-document">
                    <div class="document-image">
                        <a href="document/{{$document->unsigned_name}}/{{$document->id}}.html" title="{{$document->name}}">
                            <img alt="{{$document->name}}" src="upload/document/{{$document->image}}">
                        </a>
                        <table>
                            <tr>
                                <td style="text-align: left; padding-left: 8px;">
                                    <i class="far fa-eye"></i> 
                                    @if($document->view == '')
                                        0
                                    @else
                                        {{$document->view}}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <i class="fas fa-download"></i> 
                                    @if($document->download == '')
                                        0
                                    @else
                                        {{$document->download}}
                                    @endif
                                </td>
                                <td style="text-align: right; padding-right: 8px;">
                                    <i class="fas fa-heart"></i> 30
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="name">
                        <a href="document/{{$document->unsigned_name}}/{{$document->id}}.html" title="{{$document->name}}">

                            {{_substr($document->name, 40)}}
                        </a>
                        
                    </div>
                    
                </div>
            @endforeach
        </div><br>
    <!-- end -->

    <!-- Tài liệu tiểu học -->
        <div class="row">
            <div class="col-lg-12" style="padding: 0px">
                <h1>
                    <i class="fas fa-file-alt" style="color: #4d81ed"></i> Tiểu Học
                    <span style="float: right; font-size: 20px; margin-top: 15px"><a href="#">» Xem tất cả</a></span>
                </h1><hr>
            </div>
        </div>  
        <div class="row" style="background: #fff; padding: 15px 8px; border: 1px solid #e5e5e5">
            @foreach ($listDocumentPrimary as $document)
                <div class="col-lg-2 list-document">
                    <div class="document-image">
                        <a href="document/{{$document->unsigned_name}}/{{$document->id}}.html" title="{{$document->name}}">
                            <img alt="{{$document->name}}" src="upload/document/{{$document->image}}">
                        </a>
                        <table>
                            <tr>
                                <td style="text-align: left; padding-left: 8px;">
                                    <i class="far fa-eye"></i> 
                                    @if($document->view == '')
                                        0
                                    @else
                                        {{$document->view}}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <i class="fas fa-download"></i> 
                                    @if($document->download == '')
                                        0
                                    @else
                                        {{$document->download}}
                                    @endif
                                </td>
                                <td style="text-align: right; padding-right: 8px;">
                                    <i class="fas fa-heart"></i> 30
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="name">
                        <a href="document/{{$document->unsigned_name}}/{{$document->id}}.html" title="{{$document->name}}">

                            {{_substr($document->name, 40)}}
                        </a>
                        
                    </div>
                    
                </div>
            @endforeach
        </div><br>
    <!-- end -->

    <!-- tài liệu trung học cơ sở -->
        <div class="row">
            <div class="col-lg-12" style="padding: 0px">
                <h1>
                    <i class="fas fa-file-alt" style="color: #4d81ed"></i> Trung Học Cơ Sở
                    <span style="float: right; font-size: 20px; margin-top: 15px"><a href="#">» Xem tất cả</a></span>
                </h1><hr>
            </div>
        </div>  
        <div class="row" style="background: #fff; padding: 15px 8px; border: 1px solid #e5e5e5">
            @foreach ($listDocumentSecondary as $document)
                <div class="col-lg-2 list-document">
                    <div class="document-image">
                        <a href="document/{{$document->unsigned_name}}/{{$document->id}}.html" title="{{$document->name}}">
                            <img alt="{{$document->name}}" src="upload/document/{{$document->image}}">
                        </a>
                        <table>
                            <tr>
                                <td style="text-align: left; padding-left: 8px;">
                                    <i class="far fa-eye"></i> 
                                    @if($document->view == '')
                                        0
                                    @else
                                        {{$document->view}}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <i class="fas fa-download"></i> 
                                    @if($document->download == '')
                                        0
                                    @else
                                        {{$document->download}}
                                    @endif
                                </td>
                                <td style="text-align: right; padding-right: 8px;">
                                    <i class="fas fa-heart"></i> 30
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="name">
                        <a href="document/{{$document->unsigned_name}}/{{$document->id}}.html" title="{{$document->name}}">

                            {{_substr($document->name, 40)}}
                        </a>
                        
                    </div>
                    
                </div>
            @endforeach
        </div><br>
    <!-- end -->

    <!-- Tài liệu trung học phổ thông -->
        <div class="row">
            <div class="col-lg-12" style="padding: 0px">
                <h1>
                    <i class="fas fa-file-alt" style="color: #4d81ed"></i> Trung Học Phổ Thông
                    <span style="float: right; font-size: 20px; margin-top: 15px"><a href="#">» Xem tất cả</a></span>
                </h1><hr>
            </div>
        </div>  
        <div class="row" style="background: #fff; padding: 15px 8px; border: 1px solid #e5e5e5">
            @foreach ($listDocumentHigh as $document)
                <div class="col-lg-2 list-document">
                    <div class="document-image">
                        <a href="document/{{$document->unsigned_name}}/{{$document->id}}.html" title="{{$document->name}}">
                            <img alt="{{$document->name}}" src="upload/document/{{$document->image}}">
                        </a>
                        <table>
                            <tr>
                                <td style="text-align: left; padding-left: 8px;">
                                    <i class="far fa-eye"></i> 
                                    @if($document->view == '')
                                        0
                                    @else
                                        {{$document->view}}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <i class="fas fa-download"></i> 
                                    @if($document->download == '')
                                        0
                                    @else
                                        {{$document->download}}
                                    @endif
                                </td>
                                <td style="text-align: right; padding-right: 8px;">
                                    <i class="fas fa-heart"></i> 30
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="name">
                        <a href="document/{{$document->unsigned_name}}/{{$document->id}}.html" title="{{$document->name}}">

                            {{_substr($document->name, 40)}}
                        </a>
                        
                    </div>
                    
                </div>
            @endforeach
        </div><br>
    <!-- end -->
    </div>
</div>
@endsection