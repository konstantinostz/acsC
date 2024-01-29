<?php 
 

  function SetBeforeReq($jsondata){
          

    $jsonToObj = json_decode($jsondata);
  
    
     //print_r($jsonToObj);
     
     //echo $jsonToObj->ACSAlias;
   
    if(isset($jsonToObj->ACSAlias) && $jsonToObj->ACSAlias == "ACS_Print_Voucher"){
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
    } elseif (isset($jsonToObj->username) && isset($jsonToObj->password)){
      $AcsJson = "{
        \"ACSAlias\": \"ACS_Create_Voucher\",
        \"ACSInputParameters\": {
            \"Company_ID\": \"demo\",
            \"Company_Password\": \"demo\",
            \"User_ID\": \"$jsonToObj->username\",
            \"User_Password\": \"$jsonToObj->password\",
            \"Pickup_Date\": \"2019-01-10\",
            \"Sender\": \"$jsonToObj->senderCode\",
            \"Recipient_Name\": \"$jsonToObj->recipientName\",
            \"Recipient_Address\": \"$jsonToObj->recipientAddress\",
            \"Recipient_Address_Number\": 45,
            \"Recipient_Zipcode\": $jsonToObj->recipientZip,
            \"Recipient_Region\": \"$jsonToObj->recipientArea\",
            \"Recipient_Phone\": $jsonToObj->recipientPhone,
            \"Recipient_Cell_Phone\": $jsonToObj->recipientMobile,
            \"Recipient_Floor\": null,
            \"Recipient_Company_Name\": null,
            \"Recipient_Country\": \"GR\",
            \"Acs_Station_Destination\": null,
            \"Acs_Station_Branch_Destination\": 1,
            \"Billing_Code\": \"2ΑΘ999999\",
            \"Charge_Type\": 2,
            \"Cost_Center_Code\": null,  
            \"Item_Quantity\": $jsonToObj->qty,
            \"Weight\": $jsonToObj->weight,
            \"Dimension_X_In_Cm\": null,
            \"Dimension_Y_in_Cm\": null,
            \"Dimension_Z_in_Cm\": null,
            \"Cod_Ammount\": $jsonToObj->cashOnDelivery,
            \"Cod_Payment_Way\": 0,
            \"Acs_Delivery_Products\": \"COD\",
            \"Insurance_Ammount\": null,
            \"Delivery_Notes\": $jsonToObj->comments,
            \"Appointment_Until_Time\": null,
            \"Recipient_Email\": null,
            \"Reference_Key1\": $jsonToObj->referenceNo,
            \"Reference_Key2\": null,
            \"With_Return_Voucher\": null,
            \"Content_Type_ID\": null,
            \"Language\": null
        }
    }";
    } elseif (isset($jsonToObj->ACSAlias) && $jsonToObj->ACSAlias == "ACS_TrackingDetails"){
      
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
    
    
    
    
   
    
       
    
    
  
    echo $AcsJson;
   
    return $AcsJson;
 

  }