<?php 
include_once "public_html/Acs.php";
include_once "router.php";



$router = new Router();




$router->addRoute('POST', '/dashboard/sites/acs/create', function () {
    $elta = new Acs();
    echo $elta->ACS_Create_Voucher();
    exit;
});  







$router->matchRoute();  