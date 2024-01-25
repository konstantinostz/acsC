<?php
include_once "./acs/Acs.php";


class Router {
    

    protected $routes = []; // stores routes

    public function addRoute(string $method, string $url, Closure $target) {
        $this->routes[$method][$url] = $target;
    }

    public function matchRoute() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        error_log("1111111111111111111111111111111111" . $url);
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                // Use named subpatterns in the regular expression pattern to capture each parameter value separately
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    // Pass the captured parameter values as named arguments to the target function
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); // Only keep named subpattern matches
                    call_user_func_array($target, $params);
                    return;
                }
            }
        }
        //throw new Exception('Route not found');
    }
}

$router = new Router();

$router->addRoute("POST", '/dashboard/sites/acss/router.php', function () use ($router) {
     $Acs = new Acs();
     $Acs->CreateVoucher();
     exit;
});


$router->addRoute("POST", '/dashboard/sites/acss/acs/PrintVoucher.php', function () use ($router) {
    $PrintV = new PrintVoucher();
    $PrintV->PrintV();
    exit;
});

$router->matchRoute();

   //print_r($router->result);
   

   