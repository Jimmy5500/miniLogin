<?php

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

use function PHPSTORM_META\type;

$auth = Auth::check();
$table = new UsersTable(new MySQL());
$name = $_FILES['photo']['name'];
$type = $_FILES['photo']['type'];
$error = $_FILES['photo']['error'];
$tmp = $_FILES['photo']['tmp_name'];

if ($error) {
    HTTP::redirect("/profile.php", "error=file");
}
if ($type === "image/jpeg" || $type === "image/png") {
    $table->updatePhoto($auth->id, $name);
    move_uploaded_file($tmp, "photos/$name");
    $auth->photo = $name;
    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/profile.php", "error=type");
}
