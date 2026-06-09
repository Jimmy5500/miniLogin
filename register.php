<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <section class="d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card card-modern bg-soft">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <h1 class="display-6 fw-bold hero-title">Create Your Account</h1>
                                <p class="text-muted mb-0">Register now to start managing your profile.</p>
                            </div>

                            <?php if (isset($_GET['error'])): ?>
                                <div class="alert alert-warning">Cannot create account. Please try again.</div>
                            <?php endif ?>

                            <form action="_actions/create.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" id="registerName" placeholder="Name" required>
                                    <label for="registerName">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="registerEmail" placeholder="Email" required>
                                    <label for="registerEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="phone" class="form-control" id="registerPhone" placeholder="Phone" required>
                                    <label for="registerPhone">Phone</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="address" class="form-control" placeholder="Address" id="registerAddress" style="height: 100px" required></textarea>
                                    <label for="registerAddress">Address</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" name="password" class="form-control" id="registerPassword" placeholder="Password" required>
                                    <label for="registerPassword">Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg w-100">Register</button>
                            </form>

                            <div class="text-center mt-4">
                                <span class="text-muted">Already have an account?</span>
                                <a href="index.php" class="link-primary ms-1">Login</a>
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