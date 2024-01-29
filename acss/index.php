<?php
require_once "/xampp/htdocs/dashboard/sites/acss/router.php";
include_once "/xampp/htdocs/dashboard/sites/acss/acs/Acs.php"; 
include_once "/xampp/htdocs/dashboard/sites/acss/acs/PrintVoucher.php";
include_once "/xampp/htdocs/dashboard/sites/acss/acs/Tracking.php";



post('/dashboard/sites/acss/createVG',function (){
     $Acs = new Acs();
     $Acs->CreateVoucher();
     exit;
});


post('/dashboard/sites/acss/printVG',function(){
    $PrintV = new PrintVoucher();
    $PrintV->PrintV();
    exit;
});

post('/dashboard/sites/acss/tracking',function(){
    $Tracking = new Tracking();
    $Tracking->ShowTracking();
    exit;
});











   