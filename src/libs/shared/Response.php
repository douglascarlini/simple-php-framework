<?php

class Response
{
    public static function sendCreated()
    {
        header("HTTP/1.1 201 Created");
        exit;
    }

    public static function sendNotFound()
    {
        header("HTTP/1.1 404 Not Found");
        exit;
    }

    public static function sendData($data)
    {
        header("Content-Type: application/json");
        header("HTTP/1.1 200 OK");
        die(json_encode($data));
    }

    public static function sendError($message)
    {
        header("HTTP/1.1 500 Internal Error");
        header("Content-Type: application/json");
        die(json_encode(['message' => $message]));
    }
}
