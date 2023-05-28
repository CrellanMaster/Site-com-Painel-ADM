<?php


use CoffeeCode\Router\Router;

define("URL_BASE", "https://localhost");
define("ROOT_PATH", dirname(__DIR__));
define("CSS_PATH", ROOT_PATH . "/public/assets/css");


const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "app",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];


function url($uri = null)
{
    if ($uri) {
        return URL_BASE . "/{$uri}";
    }
    return URL_BASE;
}