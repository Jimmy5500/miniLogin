<?php

namespace Helpers;

class HTTP
{
    static $base = "http://localhost/assignment7";

    public function redirect($path, $query = "")
    {
        $url = static::$base . $path;
        if ($query) {
            $url = $url . "?$query";
        }
        header("location: $url");
        exit();
    }
}
