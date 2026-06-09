<?php
include("vendor/autoload.php");

use Helpers\Auth;

$auth = Auth::check();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="card card-modern bg-soft overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-4 border-end">
                            <div class="p-4 text-center">
                                <?php if ($auth->photo): ?>
                                    <img src="_actions/photos/<?= $auth->photo ?>" alt="Profile Photo" class="rounded-circle img-fluid mb-3" style="max-width: 180px;">
                                <?php else: ?>
                                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 180px; height: 180px;">
                                        <span class="display-6 text-primary"><?= strtoupper(substr($auth->name, 0, 1)) ?></span>
                                    </div>
                                <?php endif ?>
                                <h2 class="h4 mb-1"><?= htmlspecialchars($auth->name) ?></h2>
                                <p class="text-muted mb-0"><?= htmlspecialchars($auth->role) ?></p>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body p-4 p-md-5">
                                <div class="d-flex justify-content-between align-items-start mb-4 gap-3 flex-column flex-md-row">
                                    <div>
                                        <h3 class="h5 mb-1">Profile Details</h3>
                                        <p class="text-muted mb-0">Update your information and upload a new profile photo.</p>
                                    </div>
                                    <div>
                                        <a href="admin.php" class="btn btn-outline-secondary btn-sm me-2">Manage Users</a>
                                        <a href="_actions/logout.php" class="btn btn-danger btn-sm">Logout</a>
                                    </div>
                                </div>

                                <?php if (isset($_GET['error'])): ?>
                                    <div class="alert alert-warning">Cannot upload file.</div>
                                <?php endif ?>

                                <form action="_actions/upload.php" method="post" enctype="multipart/form-data" class="mb-4">
                                    <div class="input-group">
                                        <input type="file" name="photo" class="form-control" aria-label="Upload profile photo">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="card border-0 shadow-sm p-3 h-100">
                                            <div class="text-muted mb-2">Email</div>
                                            <div class="fw-semibold"><?= htmlspecialchars($auth->email) ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border-0 shadow-sm p-3 h-100">
                                            <div class="text-muted mb-2">Phone</div>
                                            <div class="fw-semibold"><?= htmlspecialchars($auth->phone) ?></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card border-0 shadow-sm p-3">
                                            <div class="text-muted mb-2">Address</div>
                                            <div class="fw-semibold"><?= nl2br(htmlspecialchars($auth->address)) ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>