<?php
session_start();
include 'auth.php';
blockLoggedUsersFromLogin();
?>

<?php
// ---------- DATABASE CONNECTION ----------
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_application_development_cheryala_hrishikesh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ---------- FORM SUBMISSION ----------
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    // Hash password (recommended)
    $hashedPass = password_hash($pass, PASSWORD_BCRYPT);

    // Insert query
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPass')";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='alert alert-success'>Registration Successful!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<section id="studentRegister" class="py-5" style="background-color: #f0f8ff1a;">
  <div class="container">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 400px;">
      <h2 class="mb-4 text-center">Student Registration</h2>

      <!-- Show message -->
      <?= $message ?>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
      </form>

      <div class="text-center mt-3">
        <small>Already have an account? <a href="student-login.php">Login</a></small>
      </div>
    </div>
  </div>
</section>

</body>
</html>
