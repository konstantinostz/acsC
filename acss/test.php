<?php 

class Router {
    

    protected $routes = []; // stores routes

    public function addRoute(string $method, string $url, Closure $target) {
        $this->routes[$method][$url] = $target;
    }

    public function matchRoute() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        ("1111111111111111111111111111111111" . $url);
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

try {

  


$router = new Router();

$router->addRoute("POST", '/dashboard/sites/acss/acs/Acs.php', function () {
     //$Acs = new Acs();
     //$Acs->CreateVoucher();
     //exit;
     include_once "/xampp/htdocs/dashboard/sites/acss/acs/Acs.php";
     exit;

});


$router->addRoute("POST", '/dashboard/sites/acss/acs/PrintVoucher.php', function () {
    //$PrintV = new PrintVoucher();
    //$PrintV->PrintV();
    //exit;
 
    include_once "/xampp/htdocs/dashboard/sites/acss/acs/PrintVoucher.php";

      
});

$router->matchRoute();

   
} catch (Exception $ex){
    echo $ex;
}

///////////////
post('/dashboard/sites/acsC-main/acsC-main/acss/$something',function(){
    $something = $_SERVER['REQUEST_URI'];
    $path = parse_url($something,PHP_URL_PATH);
    //print_r($path);
    $lastSegment = basename($path);
    $result = ucfirst($lastSegment);
    //echo $result;
    
    
    if(file_exists("$result.php")){
        include_once "/xampp/htdocs/dashboard/sites/acsC-main/acsC-main/acss/$result.php";
    }else {
        echo "ksexases na vali ipiresiaa mixali";
    }
    exit;
});


post('/dashboard/sites/acsC-main/acsC-main/acss/print/$something',function(){
    $something = $_SERVER['REQUEST_URI'];
    $path = parse_url($something,PHP_URL_PATH);
    //print_r($path);
    $lastSegment = basename($path);
    $result = ucfirst($lastSegment);
    //echo $result;
    
    
    if(file_exists("$result.php")){
        
        include_once "/xampp/htdocs/dashboard/sites/acsC-main/acsC-main/acss/printVoucher/$result.php";
    }else {
        echo "ksexases na vali ipiresiaa mixali";
    }
    exit;
});
