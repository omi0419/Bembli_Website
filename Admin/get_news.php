<?php

include "../Config/db.php";

$sql = "SELECT * FROM news_announcement ORDER BY news_date DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["description"] . "</p>";
        echo date("d F Y", strtotime($row['news_date']));
        echo "<hr>";
    }
}
else
{
    echo "No News Found";
}

$conn->close();

?>