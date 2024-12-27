<?php
$sessionend = false;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  $sessionend = true;
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <i class="bi bi-shield-lock me-2"></i>
      iSecure
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(!$sessionend): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/project/loginSystem/welcome.php">
            <i class="bi bi-house-door me-1"></i>Home
          </a>
        </li>
        <?php endif; ?>
      </ul>
      <div class="d-flex">
        <?php if($sessionend): ?>
          <a href="/project/loginSystem/login.php" class="btn btn-outline-light me-2">
            <i class="bi bi-box-arrow-in-right me-1"></i>Login
          </a>
          <a href="/project/loginSystem/signup.php" class="btn btn-light">
            <i class="bi bi-person-plus me-1"></i>Sign Up
          </a>
        <?php else: ?>
          <a href="/project/loginSystem/logout.php" class="btn btn-outline-light">
            <i class="bi bi-box-arrow-right me-1"></i>Logout
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
