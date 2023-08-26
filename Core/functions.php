<?php

use Core\Response;
use JetBrains\PhpStorm\NoReturn;

// Specify the path to your error log file
$errorLogFilePath = 'error.log';

// Enable error logging to the specified file
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', $errorLogFilePath);

function urlIs($value): string
{
    return $_SERVER['REQUEST_URI'] === $value ? "bg-gray-900 text-white" : "text-gray-300";
}

#[NoReturn] function abort($Response): void
{
    http_response_code($Response['code']);
    $errcode = $Response['code'];
    $errHeading = $Response['header'];
    $errContent = $Response['message'];
    require base_path("views/error.view.php");
    die();
}

function reRoute($uri): void
{
    $routes = require base_path('routes.php');
    // Check if the clean URI exists as a key in the $routes array
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort(Response::PAGE_NOT_FOUND);
    }
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path): string
{
    return BASE_PATH. $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}