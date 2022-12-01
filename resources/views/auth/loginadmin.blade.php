<!doctype html>
<html lang="en">
<head>
	<title>Aplikasi Jadwalin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('auth_asset')}}/css/style.css">

</head>
<body>
	<section class="ftco-section">
		<div class="container">			
			<div class="">
				<div class="">
					<div class="wrap">
						
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Login Admin</h3>
								</div>
								<div class="w-100">
									
								</div>
							</div>
							<form action="/authadmin" method="post" class="signin-form">
								@csrf
								<div class="form-group mt-3">
									<input type="text" class="form-control" name="username" required>
									<label class="form-control-placeholder" for="username">Username</label>
								</div>
								<div class="form-group">
									<input id="password-field" name="password" type="password" class="form-control" style="margin-top: 40px;" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit mt-3">Sign In</button>
								</div>								
							</form>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('auth_asset')}}/js/jquery.min.js"></script>
	<script src="{{asset('auth_asset')}}/js/popper.js"></script>
	<script src="{{asset('auth_asset')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('auth_asset')}}/js/main.js"></script>

</body>
</html>

