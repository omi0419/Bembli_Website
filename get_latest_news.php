<?php

header('Content-Type: application/json');

include "config/db.php";

$query = "SELECT id, title, description, news_date
          FROM news_announcement
          ORDER BY news_date DESC
          LIMIT 2";

$result = mysqli_query($conn, $query);

$news = [];

if ($result) {

    while ($row = mysqli_fetch_assoc($result)) {
        $news[] = $row;
    }
}

echo json_encode($news);

?>