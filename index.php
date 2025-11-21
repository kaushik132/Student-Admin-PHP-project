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
  <title>Welcome to Internship Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<section id="loginChoice" class="py-5" style="background-color: #f0f8ff3a;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <div class="login-choice-card shadow-sm p-5 rounded">

          <h2 class="mb-4">Welcome to Internship Portal</h2>
          <p class="mb-4">Choose your login type to continue:</p>

          <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="student-login.php" class="btn btn-primary login-btn">Student</a>
            <a href="admin-login.php" class="btn btn-primary login-btn">Admin</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
  

</body>
</html>

