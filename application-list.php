<?php
require_once "auth.php";
adminOnly();

// DB CONNECT
include "db.php";

// FETCH APPLICATIONS USING JOIN
$sql = "
    SELECT 
        a.id AS app_id,
        u.name AS user_name,
        u.email AS user_email,
        i.company_name,
        i.position_title
    FROM application a
    JOIN internship i ON a.internship_id = i.id
    JOIN users u ON a.user_id = u.id
    ORDER BY a.id DESC
";

$result = $conn->query($sql);
?>

<?php include 'header.php'; ?>

<section id="applications" class="py-4">
    <div class="container">
        <h2 class="mb-4">Applications</h2>

        <div class="table-responsive">
            <table class="table table-bordered align-middle application-table">
                <thead class="table-light">
                    <tr>
                        <th>Company Name</th>
                        <th>Role</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            
                            <tr>
                                <td><?php echo htmlspecialchars($row['company_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['position_title']); ?></td>
                                <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['user_email']); ?></td>

                                <td class="text-center">
                                    <a href="application-edit.php?id=<?php echo $row['app_id']; ?>">
                                        <button class="btn btn-sm btn-warning me-2">Edit</button>
                                    </a>

                                    <a href="application-delete.php?id=<?php echo $row['app_id']; ?>" 
                                       onclick="return confirm('Are you sure you want to delete this application?');">
                                        <button class="btn btn-sm btn-danger">Remove</button>
                                    </a>
                                </td>
                            </tr>

                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No applications found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
<?php $conn->close(); ?>
