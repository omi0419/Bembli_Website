<?php
session_start();

include "../Config/db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin_users
        WHERE username='$username'
        AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $_SESSION['admin'] = $username;

    header("Location: dashboard.php");
    exit();

} else {

    header("Location: login.php?error=1");
    exit();

}
?>