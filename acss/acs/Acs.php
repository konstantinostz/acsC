<?php 
//include_once "../acss/functions/DoRequest.php";
include_once "/xampp/htdocs/dashboard/sites/acss/functions/DoRequest.php";

class Acs {
 protected $jsonData;

  public function CreateVoucher(){      
   $this->jsonData = file_get_contents('php://input');
   //ginete request
    DoRequest($this->jsonData);
  


  }
} 