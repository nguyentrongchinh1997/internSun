@extends("client.layout.index")
@section("content")
<div class="row">
	<div class="container">
		<div class="login">
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
		    @if(session('error'))
		    <div class="alert alert-danger">
		        {{session('error')}}
		    </div>
		    @endif
			<form action="login" method="post">
				<h1 style="text-align: center;">Đăng Nhập </h1>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label>Email (*)</label>
					<input value="{{old('email')}}" class="form-control" type="email" name="email">
				</div>
				<div class="form-group">
					<label>Mật khẩu (*)</label>
					<input value="{{old('password')}}" class="form-control" type="password" name="password">
				</div>
				<button type="submit">ĐĂNG NHẬP</button><br><br>
				<p>Bạn chưa có tài khoản?. Đăng ký <a href="signup">tại đây</a></p>
			</form>
		</div>
	</div>
</div>
@endsection