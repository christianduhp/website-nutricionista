<?php
include_once(__DIR__ . '/../../config.php');

function redirectTo($path)
{
    header("Location: $path");
    exit();
}

function route($name)
{
    global $routes;
    if (isset($routes[$name])) {
        redirectTo($routes[$name]);
    } else {
        echo "Rota desconhecida: $name";
        exit();
    }
}

function getRoute($name)
{
    global $routes;
    if (isset($routes[$name])) {
        return $routes[$name];
    } else {
        echo "Rota desconhecida: $name";
        exit();
    }
}

function linkTo($name)
{
    global $routes;
    if (isset($routes[$name])) {
        echo $routes[$name];
    } else {
        echo "#";
    }
}
