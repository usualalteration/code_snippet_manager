<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Login</h2>
		<form action="checklogin.php" method="post">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" size="40">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" size="40">
			</div>
			<button type="submit" class="btn btn-primary" name="invio">Login</button>
			<button type="reset" class="btn btn-default" name="cancella">Annulla</button>
		</form>
	</div>
</body>
</html>
