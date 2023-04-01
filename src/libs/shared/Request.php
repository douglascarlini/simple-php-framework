<?php

class Request
{
    public static function get($name)
    {
        return isset($_GET[$name]) ? $_GET[$name] : null;
    }

    public static function method()
    {
        return strtoupper($_SERVER["REQUEST_METHOD"]);
    }

    public static function input()
    {
        return json_decode(file_get_contents("php://input"));
    }
}
