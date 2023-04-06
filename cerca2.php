<?php
require ("connessione.php");

if(isset($_POST["text"])){
    $search_text = mysqli_real_escape_string($conn, $_POST["text"]);

    $sql_search = "SELECT * FROM snippets WHERE descrizione OR linguaggio LIKE '%$search_text%'";

    $result = mysqli_query($conn,$sql_search);

    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Linguaggio</th><th>Descrizione</th><th>Snippet</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row["linguaggio"]."</td>";
            echo "<td>".$row["descrizione"]."</td>";
            echo "<td><pre>".$row["snippet"]."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No result found.</p>";
    }
}
mysqli_close($conn);
?>


