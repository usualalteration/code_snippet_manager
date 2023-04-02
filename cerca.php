<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ricerca codici</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form method="post" action="cerca.php" class="mt-3">
                <div class="mb-3">
                    <label for="search_text" class="form-label">Cerca:</label>
                    <input type="text" class="form-control" id="search_text" name="text" placeholder="Inserisci" required>
                </div>
                <button type="submit" class="btn btn-primary">Cerca</button>
            </form>

            <h2 class="mt-5">Risultati della tua ricerca</h2>

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
                            echo "<td>".$row["snippet"]."</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>Nessun risultato trovato.</p>";
                    }
                }
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>

