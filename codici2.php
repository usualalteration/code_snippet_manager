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
		echo "<td><pre>" . $row['snippet'] . "</td>";
		echo "<td><a href='modifica_codice.php?id=". $row['id']. "'>Edit</a></td>";
		echo "<td><a href='cancella_codice.php?id=". $row['id']. "' class='delete-link' onclick='return confirmDelete()'>Delete</a></td>";
		
	}
?>


