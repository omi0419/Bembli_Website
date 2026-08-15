<?php

include "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: view_complaints.php");
    exit();
}

$id = $_POST['id'] ?? '';
$status = $_POST['status'] ?? '';

$allowed_status = [
    'Pending',
    'In Progress',
    'Resolved'
];

if (
    empty($id) ||
    !in_array($status, $allowed_status)
) {
    header("Location: view_complaints.php?error=1");
    exit();
}

$query = "UPDATE complaints
          SET status = ?
          WHERE id = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param(
    $stmt,
    "si",
    $status,
    $id
);

if (mysqli_stmt_execute($stmt)) {

    header("Location: view_complaints.php?updated=1");
    exit();

} else {

    header("Location: view_complaints.php?error=1");
    exit();

}

mysqli_stmt_close($stmt);

?>