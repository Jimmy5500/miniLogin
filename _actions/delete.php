<?php

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

require("../vendor/autoload.php");

$id =  $_GET['id'];

if ($id !== null) {
    $table = new UsersTable(new MySQL());
    $table->delete($id);
}

HTTP::redirect("/admin.php");
