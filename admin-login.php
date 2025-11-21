<?php
session_start();
include 'auth.php';
blockLoggedUsersFromLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="login-card shadow-sm p-4">

        <h2 class="mb-4 text-center">Admin Panel Login</h2>

        <form action="admin-login-check.php" method="POST" class="login-form">
          <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Admin Email" required>
          </div>

          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">Admin Login</button>
        </form>

        <a href="index.php" class="btn btn-secondary w-100 mt-3">Back to Home</a>

      </div>
    </div>
  </div>
</section>

</body>
</html>
