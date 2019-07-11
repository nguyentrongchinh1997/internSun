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

			<form action="signup" method="post">
				<h1 style="text-align: center;">Đăng Ký </h1>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label>Tên đầy đủ</label>
					<input required="required" value="{{old('full_name')}}" class="form-control" type="text" name="full_name">
				</div>
				<div class="form-group">
					<label>Email (*)</label>
					<input required="required" value="{{old('email')}}" class="form-control" type="email" name="email">
				</div>
				<div class="form-group">
					<label>Mật khẩu (*)</label>
					<input required="required" value="{{old('password')}}" class="form-control" type="password" name="password">
				</div>
				<div class="form-group">
					<label>Nhập lại mật khẩu (*)</label>
					<input required="required" value="{{old('confirm_password')}}" class="form-control" type="password" name="confirm_password">
				</div>
				<button type="submit">ĐĂNG KÝ</button><br><br>
				<p>Bạn đã có tài khoản?. Đăng nhập <a href="login">tại đây</a></p>
			</form>
		</div>
	</div>
</div>
@endsection