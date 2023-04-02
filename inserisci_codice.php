<?php
    require ("connessione.php");

    $linguaggio = mysqli_real_escape_string($conn, $_POST["linguaggio"]);
    $descrizione = mysqli_real_escape_string($conn, $_POST["descrizione"]);
    $snippet= mysqli_real_escape_string($conn, $_POST["snippet"]);

    $sql = "INSERT INTO snippets(linguaggio, descrizione, snippet)
            VALUES ('$linguaggio', '$descrizione', '$snippet')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location:index.php");
?>

