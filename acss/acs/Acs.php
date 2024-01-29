<?php 
include_once "/xampp/htdocs/dashboard/sites/acss/functions/DoRequest.php";
include_once "/xampp/htdocs/dashboard/sites/acss/functions/MixalisJson.php";

class Acs {
  
 protected $jsonData;
 protected $reqforacs;

  public function CreateVoucher(){   

   $this->jsonData = file_get_contents('php://input');
    

   $this->reqforacs =  SetBeforeReq($this->jsonData);
    
     DoRequest($this->reqforacs);
  
  }
} 
 




?> 