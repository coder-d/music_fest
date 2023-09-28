<?php

namespace MusicFest\Core;

class Router
{
    private $routes = [];

    // Add a route to the router
    public function addRoute($method, $pattern, $callback)
    {
        $this->routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'callback' => $callback,
        ];
    }

    // Match the current request to a route and execute the associated callback
    public function route()
    {   
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $baseDir = '/app';

        // Detect the root directory dynamically
        $rootDir = str_replace($baseDir, '', dirname($_SERVER['SCRIPT_NAME']));

        // Remove the root and base directory from the request URI
        $requestUri = str_replace($rootDir, '', $requestUri);
        $requestUri = str_replace($baseDir, '', $requestUri);
        
        // Check for the root route ("/")
        if ($requestUri === '/' && $requestMethod === 'GET') {
            $this->executeCallback($this->findRouteForRoot());
            return;
        }
        
        // Check for routes
        foreach ($this->routes as $route) {
            $pattern = $route['pattern'];

            if ($requestMethod === $route['method'] && preg_match("~^$pattern$~", $requestUri, $matches)) {
                array_shift($matches); // Remove the full match
                $this->executeCallback($route['callback'], $matches);
                return;
            }
        }

        // If no route matches, handle 404 errors
        $this->handle404();
    }

    // Find the route associated with the root ("/") if it exists
    private function findRouteForRoot()
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === 'GET' && $route['pattern'] === '^/$') {
                return $route['callback'];
            }
        }
        return null;
    }

    // Execute a callback with optional parameters
    private function executeCallback($callback, $params = [])
    {
        if (is_callable($callback)) {
            call_user_func_array($callback, $params);
        }
    }

    // Handle 404 errors
    private function handle404()
    {
        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
    }
}