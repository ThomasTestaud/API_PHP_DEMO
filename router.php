<?php

class Router {
    private $routes = [];

    public function addRoute($method, $path, $controller) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller
        ];
    }

    public function route($method, $path) {
        foreach ($this->routes as $route) {
            $pattern = str_replace('/', '\/', $route['path']);
            $pattern = preg_replace('/\{[^\}]+\}/', '([^\/]+)', $pattern);

            if ($route['method'] === $method && preg_match("/^$pattern$/", $path, $matches)) {
                array_shift($matches); // Remove the full match
                return [$route['controller'], $matches];
            }
        }
        return null; // Route not found
    }
}

?>
