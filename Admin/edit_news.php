<?php

include "auth.php";

include "../config/db.php";


if (!isset($_GET['id'])) {

    header("Location: view_news.php");

    exit();

}


$id = $_GET['id'];


$query = "SELECT * FROM news_announcement WHERE id='$id'";

$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) == 0) {

    header("Location: view_news.php");

    exit();

}


$row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>

<html lang="en">


<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit News</title>


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

</head>


<body class="bg-light">


<div class="container py-5">


    <div class="row justify-content-center">


        <div class="col-lg-8">


            <div class="card shadow">


                <!-- Header -->

                <div class="card-header bg-warning text-dark">

                    <h3 class="mb-0">

                        <i class="bi bi-pencil-square"></i>

                        Edit News

                    </h3>

                </div>


                <div class="card-body">


                    <form action="update_news.php" method="POST">


                        <!-- News ID -->

                        <input
                            type="hidden"
                            name="id"
                            value="<?= $row['id']; ?>">


                        <!-- English Title -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                News Title (English)

                            </label>


                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="<?= htmlspecialchars($row['title']); ?>"
                                placeholder="Enter News Title in English"
                                required>

                        </div>


                        <!-- Marathi Title -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                News Title (Marathi)

                            </label>


                            <input
                                type="text"
                                name="title_mr"
                                class="form-control"
                                value="<?= htmlspecialchars($row['title_mr'] ?? ''); ?>"
                                placeholder="बातमीचे शीर्षक मराठीत लिहा"
                                required>

                        </div>


                        <!-- English Description -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Description (English)

                            </label>


                            <textarea
                                name="description"
                                rows="6"
                                class="form-control"
                                placeholder="Write News Description in English..."
                                required><?= htmlspecialchars($row['description']); ?></textarea>

                        </div>


                        <!-- Marathi Description -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Description (Marathi)

                            </label>


                            <textarea
                                name="description_mr"
                                rows="6"
                                class="form-control"
                                placeholder="बातमीचे वर्णन मराठीत लिहा..."
                                required><?= htmlspecialchars($row['description_mr'] ?? ''); ?></textarea>

                        </div>


                        <!-- News Date -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                News Date

                            </label>


                            <input
                                type="date"
                                name="news_date"
                                class="form-control"
                                value="<?= htmlspecialchars($row['news_date']); ?>"
                                required>

                        </div>


                        <!-- Buttons -->

                        <div class="d-flex justify-content-between">


                            <a
                                href="view_news.php"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>

                                Back

                            </a>


                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="bi bi-check-circle"></i>

                                Update News

                            </button>


                        </div>


                    </form>


                </div>

            </div>

        </div>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>