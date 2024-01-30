<?php 

 class Acs {
 
    private $apikey = "effefefefe";




    public function ACS_Create_Voucher(){
 
        try {

        
 

        $jsonData = file_get_contents('php://input');
        $trackData = json_decode($jsonData);
        
        //$customer_id;
        //$customer_service_id;
        //$customerInfo;

        //$checkValidity = $this->checkServiceValidity($trackData->api_key,$customer_id,$customer_service_id,$customerInfo);

        //if(!$checkValidity["error"]){
     
        $acsjson = prepareOrderData($trackData);
  
         //echo $acsjson;

         $response = DoRequest($acsjson);
        
         $fromJsonToObj =  json_decode($response);
         //print_r($fromJsonToObj);
         $acsRes = [];


         if($fromJsonToObj->ACSExecution_HasError == false){
            $acsRes["success"] = true;
            $acsRes["VOUCHER"] = $fromJsonToObj->ACSOutputResponce->ACSValueOutput[0]->Voucher_No;
           echo $acsRes["VOUCHER"];
         }else {
            $acsRes["errorMessage"] = $fromJsonToObj->ACSExecutionErrorMessage;
            echo  $acsRes["errorMessage"];
         }

         
  
          
         

        //}
    } catch (Exception $ex){
        $res = [];
        $res["error"] = "Error at ELTA get voucher for api_key:";
        $res["errorMessage"] = json_encode($ex);
    }

    }









}
 







///our functions



 function prepareOrderData($orderData){
      
    //$jsonToObj = json_decode($jsondata);
  
     
    //print_r($jsonToObj);
    
    //echo $jsonToObj->ACSAlias;
  
   if(isset($orderData->ACSAlias) && $orderData->ACSAlias == "ACS_Print_Voucher"){
        $AcsJson =   '{
         "ACSAlias": "ACS_Print_Voucher",
         "ACSInputParameters": {
         "Company_ID": "demo",
         "Company_Password": "demo",
         "User_ID": "demo",
         "User_Password": "demo",
         "Voucher_No": "ΧΧΧΧΧΧΧΧΧΧ",
         "Print_Type": 2,
         "Start_Position": 1
         }
         }';
   } elseif (isset($orderData->username) && isset($orderData->password)){
     $AcsJson = "{
       \"ACSAlias\": \"ACS_Create_Voucher\",
       \"ACSInputParameters\": {
           \"Company_ID\": \"demo\",
           \"Company_Password\": \"demo\",
           \"User_ID\": \"$orderData->username\",
           \"User_Password\": \"$orderData->password\",
           \"Pickup_Date\": \"2019-01-10\",
           \"Sender\": \"$orderData->senderCode\",
           \"Recipient_Name\": \"$orderData->recipientName\",
           \"Recipient_Address\": \"$orderData->recipientAddress\",
           \"Recipient_Address_Number\": 45,
           \"Recipient_Zipcode\": $orderData->recipientZip,
           \"Recipient_Region\": \"$orderData->recipientArea\",
           \"Recipient_Phone\": $orderData->recipientPhone,
           \"Recipient_Cell_Phone\": $orderData->recipientMobile,
           \"Recipient_Floor\": null,
           \"Recipient_Company_Name\": null,
           \"Recipient_Country\": \"GR\",
           \"Acs_Station_Destination\": null,
           \"Acs_Station_Branch_Destination\": 1,
           \"Billing_Code\": \"2ΑΘ999999\",
           \"Charge_Type\": 2,
           \"Cost_Center_Code\": null,  
           \"Item_Quantity\": $orderData->qty,
           \"Weight\": $orderData->weight,
           \"Dimension_X_In_Cm\": null,
           \"Dimension_Y_in_Cm\": null,
           \"Dimension_Z_in_Cm\": null,
           \"Cod_Ammount\": $orderData->cashOnDelivery,
           \"Cod_Payment_Way\": 0,
           \"Acs_Delivery_Products\": \"COD\",
           \"Insurance_Ammount\": null,
           \"Delivery_Notes\": $orderData->comments,
           \"Appointment_Until_Time\": null,
           \"Recipient_Email\": null,
           \"Reference_Key1\": $orderData->referenceNo,
           \"Reference_Key2\": null,
           \"With_Return_Voucher\": null,
           \"Content_Type_ID\": null,
           \"Language\": null
       }
   }";
   } elseif (isset($orderData->ACSAlias) && $orderData->ACSAlias == "ACS_TrackingDetails"){
     
     $AcsJson = '{
       "ACSAlias": "ACS_TrackingDetails",
       "ACSInputParameters": {
       "Company_ID": "XXXXXXX",
       "Company_Password": "XXXXXXX",
       "User_ID": "XXXXXXX",
       "User_Password": "XXXXXXX",
       "Language":
       "Voucher_No": XXXXXXXXXX
       }
       }';


   } else {
     $AcsJson = "problem";
   }
   
   
   
   
  
   
      
   
   
 
   //echo $AcsJson;
  
   return $AcsJson;
     
 }


 function DoRequest($jsondata){
     
   $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://webservices.acscourier.net/ACSRestServices/api/ACSAutoRest');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsondata));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','AcsApiKey: το api key που θα παρω'));

// Εκτέλεση του cURL
$response = curl_exec($ch);
 
//return $response; !!! auto tha epistrepsi kanonika



//$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//echo 'HTTP Status Code: ' . $httpCode;//λαμβανω 403 error

// Έλεγχος για σφάλματα
if (curl_errno($ch)) {
   echo 'cURL Error: ' . curl_error($ch);
}


curl_close($ch);

// Εκτύπωση της απάντησης
//echo  $response . '{"ACSExecution_HasError": false, "ACSExecutionErrorMessage": "", "ACSOutputResponce": {"ACSValueOutput": [{"Voucher_No": " 7227889174","Voucher_No_Return": null,"Error_Message": ""}],"ACSTableOutput": {}}}';
 
return '{"ACSExecution_HasError": false, "ACSExecutionErrorMessage": "", "ACSOutputResponce": {"ACSValueOutput": [{"Voucher_No": " 7227889174","Voucher_No_Return": null,"Error_Message": ""}],"ACSTableOutput": {}}}';
  
}  