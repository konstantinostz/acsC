<?php 


function DoRequest($jsondata){
   


    $jsonData = json_encode($jsondata);

    $ch = curl_init();
// Ορισμός των επιλογών του cURL
curl_setopt($ch, CURLOPT_URL, 'https://webservices.acscourier.net/ACSRestServices/api/ACSAutoRest');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','AcsApiKey: το api key που θα παρω'));

// Εκτέλεση του cURL
$response = curl_exec($ch);


//$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//echo 'HTTP Status Code: ' . $httpCode;//λαμβανω 403 error

// Έλεγχος για σφάλματα
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
}

// Κλείσιμο του cURL συνόλου
curl_close($ch);

// Εκτύπωση της απάντησης
//echo $response . '{"ACSExecution_HasError": false, "ACSExecutionErrorMessage": "", "ACSOutputResponce": {"ACSValueOutput": [{"Voucher_No": " 7227889174","Voucher_No_Return": null,"Error_Message": ""}],"ACSTableOutput": {}}}';
//echo "hi";
   
}  
        
            
              
                
                
          
       
        
   

