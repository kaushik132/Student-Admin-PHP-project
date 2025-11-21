<?php
require_once "auth.php";
adminOnly();
?>

<?php include 'header.php'  ?>







<div class="container my-4">
    <!-- Top Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Total Applicants</h5>
                <p>128</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Active Internships</h5>
                <p>12</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Registered Employers</h5>
                <p>6</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Popular Category</h5>
                <p>Software Development</p>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row g-3">
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="mb-3 text-center">Applicants by Category</h5>
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="mb-3 text-center">Monthly Applications</h5>
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- footer  -->
<?php include 'footer.php'  ?>