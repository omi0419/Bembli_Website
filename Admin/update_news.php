<?php

include "../config/db.php";


$id = $_POST['id'];

$title = $_POST['title'];

$title_mr = $_POST['title_mr'];

$description = $_POST['description'];

$description_mr = $_POST['description_mr'];

$news_date = $_POST['news_date'];


$query = "UPDATE news_announcement

SET

title='$title',

title_mr='$title_mr',

description='$description',

description_mr='$description_mr',

news_date='$news_date'

WHERE id='$id'";


if(mysqli_query($conn, $query))

{

    header("Location: view_news.php?updated=1");

    exit();

}

else

{

    echo "Error : " . mysqli_error($conn);

}

?>