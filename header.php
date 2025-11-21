<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  </head>
<body>
    <!-- top-Header with Menu -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="admin-dashboard.php" class="navbar-brand mb-0 h1">Admin Panel</a>
        <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
            Menu ☰
        </button>
    </div>  
</nav>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
       <ul class="list-unstyled">

            <li><a href="index.php" class="text-decoration-none">Home</a></li>
            <li><a href="internships.php" class="text-decoration-none">Active Internships</a></li>
            <li><a href="admin-add-internship.php" class="text-decoration-none">Add Internship</a></li>
            <li><a href="manage-students.php" class="text-decoration-none">Manage Students</a></li>
            <li><a href="admin-profile.php" class="text-decoration-none">My Profile</a></li>
                     <li><a href="logout.php" class="text-decoration-none">Logout</a></li>

        </ul>
    </div>
</div>  

<div id="dashboardHeader">
    <h1>Admin Dashboard</h1>
    <ul class="nav justify-content-center align-items-center" id="dashboardMenu">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="internships.php" class="nav-link">Active Internships</a></li>
        <li class="nav-item"><a href="admin-add-internship.php" class="nav-link">Add Internship</a></li>
        <li class="nav-item"><a href="manage-students.php" class="nav-link">Manage Students</a></li>
        <li class="nav-item"><a href="admin-profile.php" class="nav-link">My Profile</a></li>
             <li class="nav-item login-btn">
            
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
     
    </ul>
</div>


