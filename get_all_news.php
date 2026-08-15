<?php

header('Content-Type: application/json; charset=utf-8');

include "config/db.php";


$query = "SELECT 
            id,
            title,
            title_mr,
            description,
            description_mr,
            news_date

          FROM news_announcement

          ORDER BY news_date DESC";


$result = mysqli_query($conn, $query);


$news = [];


if ($result) {

    while ($row = mysqli_fetch_assoc($result)) {

        $news[] = [

            "id" => $row["id"],

            "title" => $row["title"],

            "title_mr" => $row["title_mr"],

            "description" => $row["description"],

            "description_mr" => $row["description_mr"],

            "date" => $row["news_date"]

        ];

    }

}


echo json_encode($news, JSON_UNESCAPED_UNICODE);

?>