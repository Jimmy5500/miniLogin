<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$all = $table->getAll();
$auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card card-modern bg-soft shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 mb-1">Manage Users</h1>
                        <p class="text-muted mb-0">Review all accounts and update roles, suspend users, or remove access.</p>
                    </div>
                    <div class="text-md-end">
                        <span class="badge bg-danger fs-6 mb-3">Total: <?= count($all) ?></span>
                        <div class="mt-3 mt-md-0">
                            <a href="profile.php" class="btn btn-outline-secondary btn-sm me-2">Profile</a>
                            <a href="_actions/logout.php" class="btn btn-danger btn-sm">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all as $user): ?>
                                <tr>
                                    <td><?= $user->id ?></td>
                                    <td><?= htmlspecialchars($user->name) ?></td>
                                    <td><?= htmlspecialchars($user->email) ?></td>
                                    <td><?= htmlspecialchars($user->phone ?? 'N/A') ?></td>
                                    <td>
                                        <?php if ($user->value === '1'): ?>
                                            <span class="badge bg-secondary"><?= $user->role ?></span>
                                        <?php elseif ($user->value === '2'): ?>
                                            <span class="badge bg-primary"><?= $user->role ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-success"><?= $user->role ?></span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if ($auth->value > 1): ?>
                                            <div class="d-flex flex-wrap gap-2">
                                                <?php if ($user->id !== $auth->id): ?>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Change Role
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="_actions/role.php?id=<?= $user->id ?>&role=1">User</a></li>
                                                            <li><a class="dropdown-item" href="_actions/role.php?id=<?= $user->id ?>&role=2">Manager</a></li>
                                                            <li><a class="dropdown-item" href="_actions/role.php?id=<?= $user->id ?>&role=3">Admin</a></li>
                                                            <li><a class="dropdown-item" href="_actions/role.php?id=<?= $user->id ?>&role=4">Owner</a></li>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($user->id !== $auth->id): ?>
                                                    <?php if ($user->suspended): ?>
                                                        <a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-danger">Suspended</a>
                                                    <?php else: ?>
                                                        <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-success">Active</a>
                                                    <?php endif ?>
                                                    <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                                <?php else: ?>
                                                    <span class="badge bg-light text-dark">You</span>
                                                <?php endif ?>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-muted">No actions available</span>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>