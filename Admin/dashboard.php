
<?php
include "auth.php";
include "../config/db.php";
include "includes/header.php";

$total_complaints = 0;
$pending_complaints = 0;
$in_progress_complaints = 0;
$resolved_complaints = 0;


// Total Complaints
$query = "SELECT COUNT(*) AS total FROM complaints";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_complaints = $row['total'];
}


// Pending
$query = "SELECT COUNT(*) AS total
          FROM complaints
          WHERE status = 'Pending'";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $pending_complaints = $row['total'];
}


// In Progress
$query = "SELECT COUNT(*) AS total
          FROM complaints
          WHERE status = 'In Progress'";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $in_progress_complaints = $row['total'];
}

// Resolved
$query = "SELECT COUNT(*) AS total
          FROM complaints
          WHERE status = 'Resolved'";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $resolved_complaints = $row['total'];
}

// Total News
$total_news = 0;

$query = "SELECT COUNT(*) AS total FROM news_announcement";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_news = $row['total'];
}

?>

<div class="d-flex">
    <?php include "includes/sidebar.php"; ?>

    <div class="main-content w-100">

        <?php include "includes/navbar.php"; ?>

       <div class="container mt-4">
            <!-- Welcome Card -->
            <div class="card mt-4 shadow border-0">
                <div class="card-body">

                    <h4>Welcome to Bembli Village Admin Panel 👋</h4>

                    <p>
                        From here you can manage all News & Announcements.
                    </p>

                </div>
            </div>


            <!-- News Statistics -->
            <div class="row mt-4 g-3">

                <!-- Total News -->
                <div class="col-md-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted">
                                        Total News
                                    </h6>
                                    <h2 class="fw-bold">
                                        <?= $total_news; ?>
                                    </h2>
                                </div>

                                <div class="fs-1 text-primary">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Today's Day -->
                <div class="col-md-4">
                    <div class="card shadow border-0 h-100">

                        <div class="card-body">

                            <h5>Today's Day</h5>

                            <h3> <?php echo date("l"); ?> </h3>

                        </div>

                    </div>
                </div>


                <!-- Today's Date -->
                <div class="col-md-4">
                    <div class="card shadow border-0 h-100">

                        <div class="card-body">

                            <h5>Today's Date</h5>

                            <h5>
                                <?php echo date("d-m-Y"); ?>
                            </h5>

                        </div>

                    </div>
                </div>

            </div>


            <!-- Complaint Statistics -->
            <div class="row mt-4 g-3">

                <!-- Total Complaints -->
                <div class="col-md-3">
                    <div class="card shadow border-0 h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <h6 class="text-muted">
                                        Total Complaints
                                    </h6>

                                    <h2 class="fw-bold">
                                        <?= $total_complaints; ?>
                                    </h2>

                                </div>

                                <div class="fs-1 text-primary">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>


                <!-- Pending -->
                <div class="col-md-3">
                    <div class="card shadow border-0 h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <h6 class="text-muted">
                                        Pending
                                    </h6>

                                    <h2 class="fw-bold">
                                        <?= $pending_complaints; ?>
                                    </h2>

                                </div>

                                <div class="fs-1 text-warning">
                                    <i class="bi bi-clock-history"></i>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>


                <!-- In Progress -->
                <div class="col-md-3">
                    <div class="card shadow border-0 h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <h6 class="text-muted">
                                        In Progress
                                    </h6>

                                    <h2 class="fw-bold">
                                        <?= $in_progress_complaints; ?>
                                    </h2>

                                </div>

                                <div class="fs-1 text-info">
                                    <i class="bi bi-arrow-repeat"></i>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>


                <!-- Resolved -->
                <div class="col-md-3">
                    <div class="card shadow border-0 h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <h6 class="text-muted">
                                        Resolved
                                    </h6>

                                    <h2 class="fw-bold">
                                        <?= $resolved_complaints; ?>
                                    </h2>

                                </div>

                                <div class="fs-1 text-success">
                                    <i class="bi bi-check-circle"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../assets/dashboard.css">
    </head>
    <body>

    <h2>Welcome Admin</h2>

    <p>Login Successful ✅</p>

    <a href="Admin/add_news.php">Add News</a><br><br>

    <a href="add_news.php">➕ Add News</a><br><br>

    <a href="view_news.php">📋 View All News</a><br><br>

    <a href="view_complaints.php">🗃️ View All Complaints</a><br><br>

    <a href="logout.php">🚪 Logout</a>

    </body>
</html>