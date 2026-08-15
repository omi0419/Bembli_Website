<?php

include "../config/db.php";


$title = $_POST['title'];

$title_mr = $_POST['title_mr'];

$description = $_POST['description'];

$description_mr = $_POST['description_mr'];

$news_date = $_POST['news_date'];


$query = "INSERT INTO news_announcement
          (title, title_mr, description, description_mr, news_date)

          VALUES
          ('$title', '$title_mr', '$description', '$description_mr', '$news_date')";


if(mysqli_query($conn, $query))

{

    echo "

    <script>

        alert('News Added Successfully!');

        window.location.href='view_news.php';

    </script>";

}

else

{

    echo "

    <script>

        alert('Failed to Add News!');

        history.back();

    </script>";

}

?>
