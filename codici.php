<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Code Snippet Manager</title>
    <link rel="stylesheet" href="style.scss">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                                <a class="nav-link" href="codici.php">Codici recenti</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="inserisci.html">Aggiungi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cerca.php">Cerca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://usualalteration.github.io/">Chi sono</a>
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
					<th>Numero</th>
					<th>Linguaggio</th>
					<th>Descrizione</th>
					<th>Snippet</th>
					<th>Azioni</th>
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
					die("Connessione non riuscita");
				}
				$sql = "SELECT * FROM snippets";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['linguaggio'] . "</td>";
					echo "<td>". $row['descrizione'] . "</td>";
					echo "<td>" . $row['snippet'] . "</td>";
					echo "<td><a href='modifica_codice.php?id=". $row['id']. "'>Modifica</a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>


