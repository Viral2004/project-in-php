<?php
include "db/_dbConnect.php";
$login = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
       
    $sql = "SELECT `username`,`password` FROM users where `username`='$username '";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if ($num==1) {
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['password'])){
                $login = true;
                // Redirect to avoid duplicate form submission
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username'] = $username;

                header("Location: /project/loginSystem/welcome.php");
                exit();
            } else {
                $login = "Invalid creditial";
                header("Location: /project/loginSystem/login.php?login=false");
                exit();
            }
        }
    } else {
        $login = "Invalid creditial";
        header("Location: /project/loginSystem/login.php?login=false");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | YourWebsiteName</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <?php require 'partials/_nav.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0">Login to Your Account</h2>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        // Show alert or error messages based on the URL parameters
                        if (isset($_GET['login']) && $_GET['login'] == 'false') {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Invalid username or password</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                        }
                        ?>

                        <form action="/project/loginSystem/login.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">Don't have an account? <a href="signup.php">Sign up now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
