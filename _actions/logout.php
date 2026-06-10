<?php
session_start();
include("../vendor/autoload.php");

use Helpers\HTTP;

session_unset();
session_destroy();
HTTP::redirect("/index.php");
