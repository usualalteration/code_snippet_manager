<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
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

            if(isset($_POST['submit'])) {
                $id=$_POST['id'];
                $linguaggio = $_POST['linguaggio'];
                $descrizione = $_POST['descrizione'];
                $snippet = $_POST['snippet'];
            
                $sql = "UPDATE snippets SET linguaggio='$linguaggio', descrizione='$descrizione', snippet='$snippet' WHERE id='$id'";
            
                if(mysqli_query($conn, $sql)) {
                    echo "Dati del codice aggiornati con successo!";
                    header("Location:codici.php");
                }
                else {
                    echo "Errore nell'aggiornamento dei dati del codice: " . mysqli_error($conn);
                }
            } else {
                $id = $_GET['id'];

                // Retrieve the existing data for this code snippet
                $sql = "SELECT * FROM snippets WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                // Fill in the form with the existing data
                $linguaggio = $row['linguaggio'];
                $descrizione = $row['descrizione'];
                $snippet = $row['snippet'];
            }
            
            mysqli_close($conn);
        ?>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="id">Numero</label>
            <input type="text" name="id" value="<?php echo $id; ?>" required readonly>
            <br>
            <label for="linguaggio">Linguaggio</label>
            <input type="text" name="linguaggio" value="<?php echo $linguaggio; ?>" required>
            <br>
            <label for="descrizione">Descrizione</label>
            <input type="text" name="descrizione" value="<?php echo $descrizione; ?>" required>
            <br>
            <label for="snippet">Snippet</label>
            <input type="text" name="snippet" value="<?php echo $snippet; ?>" required>
            <br>
            <br>
            <input type="submit" name="submit" value="modifica_codice">
        </form> 
    </body>
</html>
