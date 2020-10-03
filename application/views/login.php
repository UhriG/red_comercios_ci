<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	
	<div class="container">
		<div class="row justify-content-lg-center">
			<div class="col-lg-6">
				<form action="<?= base_url('login/validate'); ?>" method="POST" id="frm_login">
					<div class="form-group" id="email">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						<small id="emailHelp" class="form-text text-muted">Ingrese su email ejemplo@email.com</small>
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group" id="password">
						<label for="exampleInputPassword1">Contraseña</label>
						<input type="password" name="password" class="form-control" id="exampleInputPassword1">
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group">
					<button type="submit" class="btn btn-primary">Ingresar</button>
					</div>
					<div class="form-group" id="alert">
						
					</div>					
				</form>
			</div>			
		</div>	
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/auth/login.js')?>"></script>
</body>
</html>
