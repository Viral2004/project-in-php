<?php
include "db/_dbConnect.php";

$showErr = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exist = false;// You can add logic to check for existing users.
    $existSql = "SELECT * FROM `users` WHERE `username`='$username'";
    $existResult = mysqli_query($conn, $existSql);
    $numRowsExist = mysqli_num_rows($existResult);
    if ($numRowsExist > 0) {
        $showErr = "User alerady exits";
        header("Location: /project/loginSystem/signup.php?signup=error&message=" . urlencode($showErr));
        exit();

    } else {



        if ($password == '' || $cpassword == '') {

            header("Location: /project/loginSystem/signup.php?password=emp");
            exit();
        } elseif ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hash');";
            $result = mysqli_query($conn, $sql);
            if ($result) {

                header("Location: /project/loginSystem/signup.php?signup=success");
                exit();
            }
        } else {
            $showErr = "Passwords do not match.";
            header("Location: /project/loginSystem/signup.php?signup=error&message=" . urlencode($showErr));
            exit();
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup | YourWebsiteName</title>
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
                        <h2 class="mb-0">Create an Account</h2>
                    </div>
                    <div class="card-body p-4">
                        <!-- Display alert messages -->
                        <?php
                        if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle-fill me-2"></i><strong>Your account has been created! Now you can log in.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                        }

                        if (isset($_GET['signup']) && $_GET['signup'] == 'error' && isset($_GET['message'])) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>' . htmlspecialchars($_GET['message']) . '</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                        }

                        if (isset($_GET['password']) && $_GET['password'] == 'emp') {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Password is required for security.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                        }
                        ?>
                        <!-- Signup form -->
                        <form action="/project/loginSystem/signup.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword"
                                        required>
                                </div>
                                <div id="passwordHelp" class="form-text">Make sure to type the same password.</div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">Already have an account? <a href="login.php">Sign in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>