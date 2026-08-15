<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">

    <div class="container-fluid">

        <h4 class="mb-0 fw-bold">
            Dashboard
        </h4>

        <div class="d-flex align-items-center">

            <span class="me-3">

                <i class="bi bi-person-circle"></i>

                Welcome,

                <strong>

                    <?php echo $_SESSION['admin']; ?>

                </strong>

            </span>

            <a href="logout.php" class="btn btn-danger btn-sm">

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </a>

        </div>

    </div>

</nav>