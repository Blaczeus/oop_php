<?php

namespace Core;

class Session
{
    static public function has($key)
    {
        return (bool) static::get($key);
    }
    static public function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    static public function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }
    static public function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }
    static public function unflash()
    {
        unset($_SESSION['_flash']);
    }
    static public function flush()
    {
        $_SESSION = [];
    }
    static public function destroy()
    {
        static::flush();

        session_unset();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
