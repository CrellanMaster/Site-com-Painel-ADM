<?php

use CoffeeCode\Router\Router;
use Source\Main\App\Web;

require __DIR__ . "/vendor/autoload.php";

$route = new Router(URL_BASE);

$route->namespace('Source\Main\App');

$route->group(null);
$route->get("/", "Web:home");
//Login
$route->get("/login", "Web:login");
$route->post("/loginAct", "Web:loginAct");
//Logout
$route->get("/logout","Web:logout");
//Cadastro
$route->get("/sign", "Web:sign");
$route->post("/signAct", "Web:signAct");
$route->get("/admin", "Web:admin");


$route->group("ops");
$route->get("/{errcode}", "Web:error");

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}