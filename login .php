<?php
session_start();
include 'database.php'; // database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    
    $query = "SELECT * FROM users WHERE username='$username' OR email='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        //verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            header("Location: index.php"); 
            exit;
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
