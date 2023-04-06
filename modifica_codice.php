<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Snippet</title>
    <link rel="stylesheet" href="style.scss"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
        <?php
            require ("connessione.php");

            $servername= "localhost";
            $username= "root";
            $password= "";
            $dbname= "code_snippet_manager";

            $conn= mysqli_connect($servername,$username,$password,$dbname);

            if(!$conn)
            {
                die("Connessione non riuscita");
            }

            if(isset($_POST['submit']))
            {
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
            }
            else
            {
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
    <div class="container">
        <h1>Edit Snippet</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="id">Number</label>
                <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="linguaggio">Language</label>
                <input type="text" class="form-control" name="linguaggio" value="<?php echo $linguaggio; ?>" required>
            </div>
            <div class="form-group">
                <label for="descrizione">Description</label>
                <input type="text" class="form-control" name="descrizione" value="<?php echo $descrizione; ?>" required>
            </div>
            <div class="form-group">
                <label for="snippet">Snippet</label>
                <div class="code-editor">
                    <textarea class="code-editor-content form-control" name="snippet" style="white-space: pre-wrap; height: 300px;" required><?php echo htmlentities($snippet); ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
        </form>
    </div>
</body>
</html>