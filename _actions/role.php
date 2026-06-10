<?php

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

require("../vendor/autoload.php");

$id = $_GET['id'] ?? null;
$role = $_GET['role'] ?? null;

if ($id && $role !== null) {
    $table = new UsersTable(new MySQL());
    $table->changeRole($id, $role);
}

HTTP::redirect("/admin.php");
