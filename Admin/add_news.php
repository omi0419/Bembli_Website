<?php

include "auth.php";

?>

<?php if(isset($_POST['TRUE'])) { ?>

<div class="alert-container">

    <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">

        <strong>Login Failed!</strong> Invalid Username or Password.

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

</div>

<?php } ?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add News</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link href="assets/dashboard.css" rel="stylesheet">

</head>


<body class="bg-light">


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">


                <!-- Header -->

                <div class="card-header bg-primary text-white p-4">

                    <h3 class="mb-0">
                        📰 Add New News
                    </h3>

                </div>


                <div class="card-body p-4">


                    <form action="insert_news.php" method="POST">


                        <!-- English Title -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                News Title (English)

                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control"
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
                                required></textarea>

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
                                required></textarea>

                        </div>


                        <!-- Date -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Date

                            </label>

                            <input
                                type="date"
                                name="news_date"
                                class="form-control"
                                required>

                        </div>


                        <!-- Buttons -->

                        <div class="d-flex justify-content-between">

                            <a
                                href="dashboard.php"
                                class="btn btn-primary">

                                ← Back

                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary">

                                Add News

                            </button>

                        </div>


                    </form>


                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>