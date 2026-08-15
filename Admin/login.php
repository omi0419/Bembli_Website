<!-- <!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>

<form action="login_process.php" method="POST">

    Username <br>
    <input type="text" name="username" required><br><br>

    Password <br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Login">

</form>

</body>
</html> -->

<?php if(isset($_GET['error'])) { ?>

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Bembli Village</title>

    <link rel="stylesheet" href="../assets/admin.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="text-center mb-4">
            <i class="bi bi-building display-3 text-primary"></i>
            <h2 class="mt-3">Bembli Village</h2>
            <p class="text-muted">Admin Login</p>
        </div>

        <form action="login_process.php" method="POST" class="mx-auto" style="max-width:600px;">

            <div class="mb-3">
                <label class="form-label">Username</label>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>

                    <input type="text"
                           class="form-control"
                           name="username"
                           placeholder="Enter Username"
                           required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>

                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="Enter Password"
                           required>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-primary w-50 px-5">
                    Login
                </button>
            </div>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>