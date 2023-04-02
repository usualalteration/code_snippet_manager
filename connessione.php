<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "code_snippet_manager";

$conn= mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Connessione non riuscita");
}
?>