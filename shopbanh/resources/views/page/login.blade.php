@extends('layout')
@section('title')Login
@endsection('title')
@section('content')	
	<div class="container">
		<div id="content">
			
			<form action="login" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					@if (session('success_alert'))
					    <div class="alert alert-success">
					        {{ session('success_alert') }}
					    </div>
					@elseif (session('fail_alert'))
						<div class="alert alert-danger">
					        {{ session('fail_alert') }}
					    </div>
					@endif

					@if (count($errors)>0)
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger">
					       		{{ $error }}
					    	</div>
						@endforeach
					@endif
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" id="password" name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection('content')