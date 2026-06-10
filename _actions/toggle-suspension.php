<?php

require("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$id = $_GET['id'] ?? null;
$status = $_GET['status'] ?? null;

if ($id && $status !== null) {
    $table = new UsersTable(new MySQL());
    $table->updateSuspension($id, $status);
}

HTTP::redirect("/admin.php");
