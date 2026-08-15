<?php

header('Content-Type: application/json; charset=utf-8');

include "config/db.php";


$name = trim($_POST['name'] ?? '');

$mobile = trim($_POST['mobile'] ?? '');

$complaint_type = trim($_POST['complaint_type'] ?? '');

$subject = trim($_POST['subject'] ?? '');

$description = trim($_POST['description'] ?? '');


// Check required fields

if (
    empty($name) ||
    empty($mobile) ||
    empty($complaint_type) ||
    empty($subject) ||
    empty($description)
) {

    echo json_encode([
        "success" => false,
        "message" => "सर्व माहिती भरणे आवश्यक आहे."
    ]);

    exit;
}


// Mobile number validation

if (!preg_match('/^[0-9]{10}$/', $mobile)) {

    echo json_encode([
        "success" => false,
        "message" => "कृपया योग्य 10 अंकी मोबाईल नंबर टाका."
    ]);

    exit;
}


// Insert complaint

$query = "INSERT INTO complaints
          (name, mobile, complaint_type, subject, description)
          VALUES (?, ?, ?, ?, ?)";


$stmt = mysqli_prepare($conn, $query);


if (!$stmt) {

    echo json_encode([
        "success" => false,
        "message" => "Database error."
    ]);

    exit;
}


mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $name,
    $mobile,
    $complaint_type,
    $subject,
    $description
);


if (mysqli_stmt_execute($stmt)) {

    $complaint_id = mysqli_insert_id($conn);

    echo json_encode([
        "success" => true,
        "message" => "तुमची तक्रार यशस्वीरित्या नोंदवली आहे.",
        "complaint_id" => $complaint_id
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => "तक्रार नोंदवता आली नाही."
    ]);

}


mysqli_stmt_close($stmt);

?>