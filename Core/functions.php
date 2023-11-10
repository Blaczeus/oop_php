<?php /** @noinspection ALL */

use Core\Response;

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

function abortAction($Response): void
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
        abortAction($status);
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

function formatRelativeTime($timestamp)
{
    $now = time();
    $diff = $now - strtotime($timestamp);

    if ($diff < 60) {
        return $diff . ' seconds ago';
    } elseif ($diff < 3600) {
        $minutes = round($diff / 60);
        return $minutes == 1 ? '1 minute ago' : $minutes . ' minutes ago';
    } elseif ($diff < 86400) {
        $hours = round($diff / 3600);
        return $hours == 1 ? '1 hour ago' : $hours . ' hours ago';
    } elseif ($diff < 604800) {
        $days = round($diff / 86400);
        return $days == 1 ? '1 day ago' : $days . ' days ago';
    } else {
        return date('F j, Y H:i:s', strtotime($timestamp));
    }
}

function redirect($path) 
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}