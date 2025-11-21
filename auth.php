<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// -------------------
// BLOCK LOGIN PAGES
// -------------------
function blockLoggedUsersFromLogin() {
    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {

        if ($_SESSION['role'] === "admin") {
            header("Location: admin-dashboard.php");
            exit();
        }

        if ($_SESSION['role'] === "student") {
            header("Location: student-dashboard.php");
            exit();
        }
    }
}



// -------------------
// ADMIN ONLY PROTECT
// -------------------
function adminOnly() {
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || $_SESSION['role'] !== "admin") {
        header("Location: admin-login.php");
        exit();
    }
}



// -------------------
// STUDENT ONLY PROTECT
// -------------------
function studentOnly() {
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || $_SESSION['role'] !== "student") {
        header("Location: student-login.php");
        exit();
    }
}
?>
