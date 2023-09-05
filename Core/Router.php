<?php /** @noinspection ALL */

namespace Core;
class Router {
    public $routes = [];

    public function add($path, $controller, $method): array
    {
        return $this->routes[] = compact('path','controller', 'method');
    }

    public function get($path, $controller)
    {
        $this->add($path, $controller, 'GET');
    }
    public function post($path, $controller)
    {
        $this->add($path, $controller, 'POST');
    }
    public function delete($path, $controller)
    {
        $this->add($path, $controller, 'DELETE');
    }
    public function patch($path, $controller)
    {
        $this->add($path, $controller, 'PATCH');
    }
    public function put($path, $controller)
    {
        $this->add($path, $controller, 'PUT');
    }


    public function route($path, $method)
    {
        foreach ($this->routes as $route)
        {
            if ($route['path'] === $path && $route['method'] === strtoupper($method))
            {
                return require base_path($route['controller']);
            }
        }
        abort(Response::PAGE_NOT_FOUND);
    }
}