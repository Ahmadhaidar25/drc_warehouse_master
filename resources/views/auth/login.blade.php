<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
	<section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="min-height: 100vh; background-size: cover; background-image: url(logo/login_background.png);">
		<div class="container-fluid">
			<div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
				<div class="col-12 col-md-4 col-lg-3   h-50 ">
					<div class="card shadow">
						<div class="card-body mx-auto">
							<h4 class="card-title mt-3 text-center">Login Account</h4>
							
							<p class="text-muted font-weight-bold ">
								<span>OR</span>
							</p>

							<form action="{{url('/auth/response')}}" method="post">
								@csrf
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
									</div>
									<input name="nik" class="form-control" placeholder="Nik" type="text">
								</div>


								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
									</div>
									<input class="form-control" placeholder="********" 
									type="password" name="password">
								</div>
								<button class="btn btn-block btn-success" type="submit">Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
@include('sweetalert::alert')

</html>