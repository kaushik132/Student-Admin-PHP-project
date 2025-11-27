<?php
require_once "auth.php";
studentOnly();
include "db.php";

$user_id = $_SESSION['userid']; // session se id

// ---- Fetch User Data ----
$sql = "SELECT * FROM users WHERE id = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$message = "";

// ---- Update Form Submit ----
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];

    // --- Profile Picture Upload ---
    $profile = $user['profile']; 
    if (!empty($_FILES['profile']['name'])) {
        $ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
        $profile = "uploads/profile_" . time() . "." . $ext;
        move_uploaded_file($_FILES['profile']['tmp_name'], $profile);
    }

    // --- CV Upload ---
    $cv = $user['cv'];
    if (!empty($_FILES['cv']['name'])) {
        $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
        $cv = "uploads/cv_" . time() . "." . $ext;
        move_uploaded_file($_FILES['cv']['tmp_name'], $cv);
    }

    // --- Cover Letter Upload ---
    $coverletter = $user['coverletter'];
    if (!empty($_FILES['coverletter']['name'])) {
        $ext = pathinfo($_FILES['coverletter']['name'], PATHINFO_EXTENSION);
        $coverletter = "uploads/cover_" . time() . "." . $ext;
        move_uploaded_file($_FILES['coverletter']['tmp_name'], $coverletter);
    }

    // ---- Update Query ----
    $update = "UPDATE users SET 
                profile = ?, 
                name = ?, 
                email = ?, 
                phone = ?, 
                address = ?, 
                cv = ?, 
                coverletter = ?
               WHERE id = ?";

    $stmt2 = $conn->prepare($update);
    $stmt2->bind_param("sssssssi", $profile, $name, $email, $phone, $address, $cv, $coverletter, $user_id);

    if ($stmt2->execute()) {
        $message = "<div class='alert alert-success'>Profile Updated Successfully!</div>";

        // reload updated data
        header("Location: student-profile.php");
        exit;
    } else {
        $message = "<div class='alert alert-danger'>Update failed.</div>";
    }
}

include 'student-header.php';
?>

<section id="myProfile" class="py-5" style="background-color: #f0f8ff1a;">
  <div class="container">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 900px;">
      <h2 class="mb-4 text-center">My Profile</h2>

      <?= $message ?>

      <form method="POST" enctype="multipart/form-data">

        <!-- Profile Picture -->
        <div class="mb-3 text-center">
          <label class="form-label d-block">Profile Picture</label>

          <?php if ($user['profile']) { ?>
            <img src="<?= $user['profile'] ?>" width="120" class="mb-2 rounded-circle">
          <?php } ?>

          <input type="file" name="profile" class="form-control-file">
        </div>

        <div class="row g-3">

          <!-- Full Name -->
          <div class="col-md-12">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control">
          </div>

        </div>

        <!-- Email -->
        <div class="mb-3 mt-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control">
        </div>

        <!-- Mobile Number -->
        <div class="mb-3">
          <label class="form-label">Mobile Number</label>
          <input type="text" name="phone" value="<?= $user['phone'] ?>" class="form-control">
        </div>

        <!-- Address -->
        <div class="mb-3">
          <label class="form-label">Address</label>
          <textarea name="address" class="form-control" rows="2"><?= $user['address'] ?></textarea>
        </div>

        <!-- CV -->
        <div class="mb-3">
          <label class="form-label d-block">Add CV</label>

          <?php if ($user['cv']) { ?>
            <a href="<?= $user['cv'] ?>" target="_blank">View Current CV</a><br>
          <?php } ?>

          <input type="file" name="cv" class="form-control-file">
        </div>

        <!-- Cover Letter -->
        <div class="mb-3">
          <label class="form-label d-block">Add Cover Letter</label>

          <?php if ($user['coverletter']) { ?>
            <a href="<?= $user['coverletter'] ?>" target="_blank">View Current Cover Letter</a><br>
          <?php } ?>

          <input type="file" name="coverletter" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-3">Update Profile</button>

      </form>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
