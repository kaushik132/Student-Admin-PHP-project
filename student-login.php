<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Internship Portal</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="login-card shadow-sm p-4">

        <h2 class="mb-4 text-center">Student Internship Portal</h2>

        <!-- Show Error Message -->
        <?php 
        if(isset($_SESSION['error'])){
            echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
            unset($_SESSION['error']);
        }
        ?>

        <!-- Student Login Form -->
        <form method="POST" action="student-login-check.php" class="login-form">
          <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>

          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>

          <div class="text-center mt-3">
            <small>Don't have an account? <a href="register.php">Register</a></small>
          </div>
        </form>

        <a href="index.php" class="btn btn-secondary w-100 mt-3">Back to Home</a>

      </div>
    </div>
  </div>
</section>

</body>
</html>
