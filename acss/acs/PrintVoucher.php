<?php

include_once "Acs.php";
include_once "/xampp/htdocs/dashboard/sites/acss/functions/DoRequest.php";

class PrintVoucher extends Acs {
    protected $jsondec;
    public function PrintV() {
        
        // Εδώ μπορείτε να προσθέσετε κώδικα για τον τρόπο εκτύπωσης του voucher
        $this->jsonData =  file_get_contents('php://input');
         
       $this->jsondec = json_decode($this->jsonData);
        //echo  ($this->jsondec->ACSInputParameters->Company_ID);


        DoRequest($this->jsonData);
        
        echo "Για το deserialize του json στο ACSObjectOutput που παίρνετε ως response, κάθε γραμμή που
        επιστρέφεται είναι ένα dictionary με κλειδί το voucher και value το byte array που έχει το
        pdf";
    }
}

$print = new PrintVoucher();
$print->PrintV();
?>

