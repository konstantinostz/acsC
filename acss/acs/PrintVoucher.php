<?php

include_once "/xampp/htdocs/dashboard/sites/acss/functions/DoRequest.php";
include_once "/xampp/htdocs/dashboard/sites/acss/functions/MixalisJson.php";




class PrintVoucher  {
    protected $jsondec;
    protected $jsonData;
    public function PrintV() {
        
        // Εδώ μπορείτε να προσθέσετε κώδικα για τον τρόπο εκτύπωσης του voucher
        $this->jsonData =  file_get_contents('php://input');
        
          

         $this->jsondec  =  SetBeforeReq($this->jsonData);
          
         DoRequest($this->jsondec);
        
        //echo "Για το deserialize του json στο ACSObjectOutput που παίρνετε ως response, κάθε γραμμή που
        //επιστρέφεται είναι ένα dictionary με κλειδί το voucher και value το byte array που έχει το
        //pdf";
    }
}
 

 


?>

