<?php /** @noinspection ALL */

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;
class Router {
    public $routes = [];

    public function add($path, $controller, $method, $middleware = null)
    {
        $this->routes[] = compact('path','controller', 'method', 'middleware');
        return $this;
    }

    public function get($path, $controller)
    {
        return $this->add($path, $controller, 'GET');
    }

    public function post($path, $controller)
    {
        return $this->add($path, $controller, 'POST');
    }

    public function delete($path, $controller)
    {
        return $this->add($path, $controller, 'DELETE');
    }

    public function patch($path, $controller)
    {
        return $this->add($path, $controller, 'PATCH');
    }

    public function put($path, $controller)
    {
        return $this->add($path, $controller, 'PUT');
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($path, $method)
    {
        foreach ($this->routes as $route)
        {
            if ($route['path'] === $path && $route['method'] === strtoupper($method))
            {
                if ($route['middleware'] ?? false) {
                    Middleware::resolve($route['middleware']);
                }
                return require base_path('Http/controllers/'.$route['controller']);
            }
        }
        abort(Response::PAGE_NOT_FOUND);
    }

}