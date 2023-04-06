<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form method="post" action="cerca.php" class="mt-3">
                <div class="mb-3">
                    <label for="search_text" class="form-label">Search:</label>
                    <input type="text" class="form-control" id="search_text" name="text" placeholder="Inserisci" required>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <h2 class="mt-5">Results</h2>
            <?php require("cerca2.php"); ?>
        </div>
    </body>
</html>
