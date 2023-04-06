<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Code Snippet Manager</title>
        <link href="style.scss" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
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
                                <a class="nav-link" href="cerca.php">Search</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://usualalteration.github.io/">Who am I</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="nav navbar-nav navbar-right navbar-inverse">
                        <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registra.php">Sign up</a>
                            </li>
                        </ul>
                        </div>
                </div>
            </nav>
            <table class="table table-striped">
			<thead>
				<tr>
					<th>Number</th>
					<th>Language</th>
					<th>Description</th>
					<th>Snippet</th>
				</tr>
			</thead>
			<tbody>
                <?php
				require ("connessione.php");
				$servername= "localhost";
				$username= "root";
				$password= "";
				$dbname= "code_snippet_manager";

				$conn= mysqli_connect($servername,$username,$password,$dbname);

				if(!$conn){
					die("Connection failed");
				}
				$sql = "SELECT * FROM snippets";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['linguaggio'] . "</td>";
					echo "<td>". $row['descrizione'] . "</td>";
					echo "<td><pre>" . $row['snippet'] . "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
        </header>
    </body>
</html>