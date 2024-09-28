<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin cell Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('assets-login/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('assets-login/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets-login/css/custom.css')}}">
	</head>
	@include('admin.message')
	<body class="hold-transition login-page">
    
    
        <div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="login-box">
			<!-- /.login-logo -->
            
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<h3>Admin Login</h3>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Login để vào trang quản trị</p>
					<form action="{{ route('admin.authenticate')}}" method="post">
                        @csrf
                        <!-- bao mat -->
                    <div class="input-group mb-3">
							<input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>

                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror


				  		</div>
				  		<div class="input-group mb-3">
							<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>
                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
				  		</div>
				  		<div class="row">
							<!-- /.col -->
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">Login</button>
							</div>
							<!-- /.col -->
                             
				  		</div>
					</form>
		  			<p class="mb-1 mt-3">
				  		<a href="forgot-password.html">I forgot my password</a>
					</p>					
			  	</div>
			  	<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('assets-login/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('assets-login/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('assets-login/js/adminlte.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<!-- <script src="{{asset('assets/js/demo.js')}}"></script> -->
	</body>
</html>