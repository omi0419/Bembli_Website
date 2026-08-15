<?php

include "auth.php";
include "../Config/db.php";

$id = $_GET['id'];

$sql = "DELETE FROM news_announcement WHERE id='$id'";

if ($conn->query($sql) == TRUE) {

    header("Location: view_news.php");
    exit();

} else {

    echo "Error : " . $conn->error;

}

$conn->close();

?>