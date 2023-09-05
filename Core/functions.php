<?php /** @noinspection ALL */

use Core\Response;
use JetBrains\PhpStorm\NoReturn;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value): string
{
    return $_SERVER['REQUEST_URI'] === $value ? "bg-gray-900 text-white" : "text-gray-300";
}

function abort($Response): void
{
    http_response_code($Response['code']);
    $errcode = $Response['code'];
    $errHeading = $Response['header'];
    $errContent = $Response['message'];
    require base_path("views/error.view.php");
    die();
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