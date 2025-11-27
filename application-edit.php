<?php
require_once "auth.php";
adminOnly();

// ---------- DB CONNECT ----------
include "db.php";

// ---------- GET APPLICATION ID ----------
if (!isset($_GET['id'])) {
    die("Invalid Request");
}

$app_id = $_GET['id'];

// ---------- FETCH DATA ----------
$sql = "
    SELECT 
        a.id,
        a.status,
        u.name AS user_name,
        u.email AS user_email,
        i.position_title,
        i.company_name
    FROM application a
    JOIN users u ON a.user_id = u.id
    JOIN internship i ON a.internship_id = i.id
    WHERE a.id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $app_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Application not found.");
}

// ---------- STATUS OPTIONS ----------
$statusOptions = [
    0 => "Under Review",
    1 => "Shortlisted",
    2 => "Interview Scheduled",
    3 => "Rejected"
];


// ---------- UPDATE FORM SUBMIT ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $status = $_POST['status'];

    $updateSql = "UPDATE application SET status = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ii", $status, $app_id);

    if ($updateStmt->execute()) {
        echo "<script>alert('Application Updated Successfully!'); window.location='application-list.php';</script>";
    } else {
        echo "<script>alert('Error updating application!');</script>";
    }
}

?>

<?php include 'header.php'; ?>

<section id="edit-application" class="py-4">
  <div class="container">
    <div class="edit-card shadow-sm p-4" style="max-width:600px; margin:auto;">
      <h2 class="mb-3">Edit Application</h2>

      <form method="POST">

        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" value="<?php echo $data['user_name']; ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" value="<?php echo $data['user_email']; ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label">Role (Position)</label>
          <input type="text" class="form-control" value="<?php echo $data['position_title']; ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label">Company Name</label>
          <input type="text" class="form-control" value="<?php echo $data['company_name']; ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-control" name="status">
            <?php foreach ($statusOptions as $key => $value): ?>
              <option value="<?php echo $key; ?>" 
                      <?php echo ($key == $data['status']) ? 'selected' : ''; ?>>
                <?php echo $value; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2">Save Changes</button>

      </form>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
<?php $conn->close(); ?>
