<?php
require_once 'config.php';

// Acquisizione dati dal form
$username = strtolower($_POST["username"]);
$password = $_POST["password"];

// Protezione per SQL Injection
$username = stripcslashes($username);
$password = stripcslashes($password);

$conn = getdb();
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Lettura tabella utenti
$check = false;
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
$conta = $result->num_rows;
if($conta == 1){
	$row = $result->fetch_assoc();
	$pass = $row['password'];
	//if(password_verify($password, $pass)){
	if(($password) == $pass){
		$check = true;
	}
}
if($check){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $pass;
	header("Location: loginok.php");
}else{
	echo "Identificazione non riuscita: username o password errate<br>";
	echo "Torna alla pagina di <a href=\"login.php\">Login</a>";
}
?>