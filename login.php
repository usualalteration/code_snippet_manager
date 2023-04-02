<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - Code Snippet Manager</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Login</h1>
            <form method="post" action="login.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <?php
                session_start();
                
                // check if user is already logged in
                if(isset($_SESSION['username'])){
                    header("location:index.php");
                    exit;
                }
                
                // check if form is submitted
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    // connect to database
                    $host = "localhost";
                    $username = "your_db_username";
                    $password = "your_db_password";
                    $dbname = "your_db_name";
                    $conn = mysqli_connect($host, $username, $password, $dbname);
                    if(!$conn){
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    // sanitize input data
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    
                    // query database for user
                    $sql = "SELECT * FROM users WHERE username='$username'";
                    $result = mysqli_query($conn, $sql);
                    
                    // check if user exists and password is correct
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_assoc($result);
                        if(password_verify($password, $row['password'])){
                            $_SESSION['username'] = $username;
                            header("location:index.php");
                            exit;
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                                    Incorrect password.
                                </div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                                User not found.
                            </div>';
                    }
                    
                    // close database connection
                    mysqli_close($conn);
                }
            ?>
        </div>
    </body>
</html>
