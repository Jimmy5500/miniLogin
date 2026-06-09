<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <section class="d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-5">
                    <div class="card card-modern bg-soft">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <h1 class="display-6 fw-bold hero-title">Welcome Back</h1>
                                <p class="text-muted mb-0">Sign in to access your account dashboard.</p>
                            </div>

                            <?php if (isset($_GET['register'])): ?>
                                <div class="alert alert-success">Registered successfully. Please login.</div>
                            <?php endif ?>
                            <?php if (isset($_GET['suspended'])): ?>
                                <div class="alert alert-danger">Your account is suspended.</div>
                            <?php endif ?>
                            <?php if (isset($_GET['incorrect'])): ?>
                                <div class="alert alert-danger">Incorrect email or password.</div>
                            <?php endif ?>

                            <form action="_actions/login.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Email" required>
                                    <label for="loginEmail">Email</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Password" required>
                                    <label for="loginPassword">Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                            </form>

                            <div class="text-center mt-4">
                                <span class="text-muted">Don’t have an account?</span>
                                <a href="register.php" class="link-primary ms-1">Create one</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>