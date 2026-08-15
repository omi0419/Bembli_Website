<?php

include "auth.php";
include "../config/db.php";

$query = "SELECT * FROM complaints ORDER BY id DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Complaints</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

</head>

<body class="bg-light">

<?php if (isset($_GET['updated'])) { ?>

    <div class="container mt-3">

        <div
            class="alert alert-success alert-dismissible fade show shadow"
            role="alert">

            <strong>Success!</strong>
            Complaint status updated successfully.

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    </div>

<?php } ?>


<?php if (isset($_GET['error'])) { ?>

    <div class="container mt-3">

        <div
            class="alert alert-danger alert-dismissible fade show shadow"
            role="alert">

            <strong>Error!</strong>
            Unable to update complaint status.

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    </div>

<?php } ?>

<div class="container-fluid py-5">

    <div class="card shadow-lg border-0">

        <!-- Header -->

        <div class="card-header bg-primary text-white">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="mb-0">

                    <i class="bi bi-file-earmark-text"></i>

                    All Complaints

                </h3>

                <a
                    href="dashboard.php"
                    class="btn btn-light btn-sm">

                    <i class="bi bi-arrow-left"></i>

                    Dashboard

                </a>

            </div>

        </div>


        <!-- Body -->

        <div class="card-body">

            <div class="table-responsive">

                <table
                    class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>Sr. No.</th>

                            <th>Name</th>

                            <th>Mobile</th>

                            <th>Complaint Type</th>

                            <th>Subject</th>

                            <th>Description</th>

                            <th>Date</th>

                            <th>Status</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php

                    $sr = 1;

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                        <tr>

                            <td>
                                <?= $sr++; ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['name']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['mobile']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['complaint_type']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['subject']); ?>
                            </td>

                            <td style="min-width: 250px;">

                                <?= nl2br(
                                    htmlspecialchars(
                                        $row['description']
                                    )
                                ); ?>

                            </td>

                            <td>

                                <?= date(
                                    'd M Y',
                                    strtotime(
                                        $row['created_at']
                                    )
                                ); ?>

                            </td>

                            <td>

                                <form
                                    action="update_complaint.php"
                                    method="POST"
                                    class="d-flex gap-2">

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= $row['id']; ?>">

                                    <select
                                        name="status"
                                        class="form-select form-select-sm">

                                        <option
                                            value="Pending"
                                            <?= $row['status'] == 'Pending' ? 'selected' : ''; ?>>
                                            Pending
                                        </option>

                                        <option
                                            value="In Progress"
                                            <?= $row['status'] == 'In Progress' ? 'selected' : ''; ?>>
                                            In Progress
                                        </option>

                                        <option
                                            value="Resolved"
                                            <?= $row['status'] == 'Resolved' ? 'selected' : ''; ?>>
                                            Resolved
                                        </option>

                                    </select>

                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-sm">

                                        <i class="bi bi-check-lg"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php

                        }

                    } else {

                    ?>

                        <tr>

                            <td
                                colspan="8"
                                class="text-center py-4">

                                <i
                                    class="bi bi-inbox fs-1 text-muted">
                                </i>

                                <p class="mt-2 mb-0">
                                    No Complaints Found
                                </p>

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


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>