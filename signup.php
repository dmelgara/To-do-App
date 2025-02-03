<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';


    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the user already exists
    $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        die("Username or Email already exists!");
    } else {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            echo "Signup successful! You can now <a href='login.html'>Log in</a>.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
