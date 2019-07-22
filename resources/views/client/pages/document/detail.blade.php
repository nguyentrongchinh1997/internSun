@extends("client.layout.index")
@section("content")
<div class="row">
	<div class="container">
		<div class="col-lg-12" style="margin-top: 20px">
			<a href="home"><i class="fas fa-home"></i> Trang chủ </a><span> » </span><a href="">{{$category->name}}</a><span> » {{_substr($detail->name, 20)}}</span>
		</div>
		<div class="col-lg-9">
			<h1 style="font-size: 25px; font-weight: bold;">
				{{$detail->name}}
			</h1>
			<p>
				<span style="color: #727272">
					Số trang: <i class="far fa-file-alt"></i> <b>{{$detail->page}}</b> | 
					Loại file: <i class="far fa-file-pdf"></i> <b>{{$detail->format}}</b> | 
					Lượt xem: <i class="far fa-eye"></i> 
					    <b>
					        @if ($detail->view == '') 
					            {{'0'}} 
					        @else 
					            {{$detail->view}} 
					        @endif
					    </b>
					Lượt tải: <i class="fas fa-download"></i>
					    <b>
					        @if ($detail->download == '') 
					            {{'0'}} 
					        @else 
					            {{$detail->download}} 
					        @endif
					    </b>
					<span style="float: right;">
						<a style="border-radius: 4px; color: #fff; background: #4d81ed; padding: 10px 15px" href=""><i class="fas fa-download"></i> Tải xuống</a>
					</span>
				</span>
			</p>
			<div class="dicription">
				<h3>Mô tả</h3><br>
				{!!$detail->dicription!!}
			</div>
		</div>		
	</div>
	

</div>
@endsection