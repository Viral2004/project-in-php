<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo htmlspecialchars($_SESSION['username']);?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body class="bg-light">
    <?php require 'partials/_nav.php'; ?>
    
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white text-center py-4">
              <h2 class="mb-0">Welcome, <?php echo htmlspecialchars($_SESSION['username']);?>!</h2>
            </div>
            <div class="card-body p-4">
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><i class="bi bi-check-circle-fill me-2"></i>Successfully Logged In</h4>
                <p>Congratulations! You've successfully logged into your account. We're excited to have you here and hope you enjoy your experience on our platform.</p>
                <hr>
                <p class="mb-0">Feel free to explore all the features and services we offer. If you need any assistance, don't hesitate to reach out to our support team.</p>
              </div>
              
              <div class="mt-4">
                <h5>What would you like to do next?</h5>
                <div class="row mt-3">
                  <div class="col-md-6 mb-3">
                    <div class="d-grid">
                      <a href="#" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-person-fill me-2"></i>View Profile
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="d-grid">
                      <a href="#" class="btn btn-outline-success btn-lg">
                        <i class="bi bi-gear-fill me-2"></i>Account Settings
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-center py-3">
              <p class="mb-0">Need help? <a href="#">Contact Support</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
