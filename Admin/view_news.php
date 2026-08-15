<?php
include "auth.php";
include "../config/db.php";

$query = "SELECT * FROM news_announcement ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$sr = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View News</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">
                <i class="bi bi-newspaper"></i>
                All News
            </h3>

            <a href="dashboard.php" class="btn btn-light btn-sm">
                <i class="bi bi-house"></i>
                Dashboard
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="70">SR No.</th>

                            <th width="220">Title</th>

                            <th>Description</th>

                            <th width="160">Date</th>

                            <th width="180" class="text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>

                        <tr>

                            <td><?= $sr++; ?></td>

                            <td>
                                <strong><?= htmlspecialchars($row['title']); ?></strong>
                            </td>

                            <td>
                                <?= nl2br(htmlspecialchars($row['description'])); ?>
                            </td>

                            <td>
                                <?= date('d M Y', strtotime($row['news_date'])); ?>
                            </td>

                            <td class="text-center">

                                <a href="edit_news.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <a href="delete_news.php?id=<?= $row['id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this news?');">

                                    <i class="bi bi-trash"></i> Delete

                                </a>

                            </td>

                        </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                        <tr>

                            <td colspan="5" class="text-center text-danger fw-bold">

                                No News Found.

                            </td>

                        </tr>

                    <?php
                    }
                    ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>