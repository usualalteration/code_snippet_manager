<?php require("connessione.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Code Snippet Manager</title>
    <link rel="stylesheet" href="style.scss">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="seisicuro.js"></script>
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Code Snippet Manager</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="codici.php">Snippets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="inserisci.html">Add</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cerca.php">Search</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://usualalteration.github.io/">Who am I</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
</header>

<body>
	<div class="container">
		<h1>Code Snippet Manager</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Number</th>
					<th>Langage</th>
					<th>Description</th>
					<th>Snippet</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
                <?php require("codici2.php"); ?>
			</tbody>
			<script>
function confirmDelete() {
    if (confirm("Are you sure you want to delete this code snippet?")) {
        return true;
    } else {
        return false;
    }
}
</script>

		</table>
	</div>
</body>
</html>
