<?php
require_once "auth.php";
adminOnly();
include "db.php";
include "header.php";

// -------------------- DASHBOARD DATA --------------------

// 1. Total Applicants (application table)
$totalApplicants = $conn->query("
    SELECT COUNT(*) AS total FROM application
")->fetch_assoc()['total'];

// 2. Active Internships (internship table — apply_by future date माना active)
$activeInternships = $conn->query("
    SELECT COUNT(*) AS total FROM internship 
")->fetch_assoc()['total'];

// 3. Registered Students (users table)
$registeredStudents = $conn->query("
    SELECT COUNT(*) AS total FROM users
")->fetch_assoc()['total'];

// 4. Popular Category (internship category with most applications)
$popularCategoryQuery = $conn->query("
    SELECT i.category, COUNT(a.id) AS total
    FROM application a
    JOIN internship i ON a.internship_id = i.id
    GROUP BY i.category
    ORDER BY total DESC
    LIMIT 1
");

$popularCategory = "N/A";
if ($popularCategoryQuery->num_rows > 0) {
    $popularCategory = $popularCategoryQuery->fetch_assoc()['category'];
}

// 5. Applicants by Category (Chart)
$categoryData = $conn->query("
    SELECT i.category, COUNT(a.id) AS total
    FROM application a
    JOIN internship i ON a.internship_id = i.id
    GROUP BY i.category
");

$categoryNames = [];
$categoryValues = [];

while ($row = $categoryData->fetch_assoc()) {
    $categoryNames[] = $row['category'];
    $categoryValues[] = $row['total'];
}

// 6. Monthly Applications (Chart)
$monthData = $conn->query("
    SELECT DATE_FORMAT(created_at, '%b') AS month, COUNT(*) AS total
    FROM application
    GROUP BY MONTH(created_at)
    ORDER BY MONTH(created_at)
");

$monthNames = [];
$monthValues = [];

while ($row = $monthData->fetch_assoc()) {
    $monthNames[] = $row['month'];
    $monthValues[] = $row['total'];
}

?>

<div class="container my-4">

    <!-- Top Stats Cards -->
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card p-3">
                <h5>Total Applicants</h5>
                <p><?= $totalApplicants ?></p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>Active Internships</h5>
                <p><?= $activeInternships ?></p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>Registered Students</h5>
                <p><?= $registeredStudents ?></p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>Popular Category</h5>
                <p><?= $popularCategory ?></p>
            </div>
        </div>

    </div>

    <!-- Charts Section -->
    <div class="row g-3">

        <!-- Applicants by Category -->
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="mb-3 text-center">Applicants by Category</h5>
                <canvas id="categoryChart"></canvas>
            </div>
        </div>

        <!-- Monthly Applications -->
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="mb-3 text-center">Monthly Applications</h5>
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// ---------------- Category Chart ----------------
new Chart(document.getElementById('categoryChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($categoryNames) ?>,
        datasets: [{
            label: 'Applicants',
            data: <?= json_encode($categoryValues) ?>,
            borderWidth: 1
        }]
    }
});

// ---------------- Monthly Apps Chart ----------------
new Chart(document.getElementById('monthlyChart'), {
    type: 'line',
    data: {
        labels: <?= json_encode($monthNames) ?>,
        datasets: [{
            label: 'Applications',
            data: <?= json_encode($monthValues) ?>,
            borderWidth: 2,
            fill: false,
            tension: 0.3
        }]
    }
});
</script>

<?php include "footer.php"; ?>
