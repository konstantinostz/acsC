<?php

require_once "./functions/DoRequest.php";


$jso = '{
    "ACSAlias": "ACS_Create_Voucher",
    "ACSInputParameters": {
        "Company_ID": "demo",
        "Company_Password": "demo",
        "User_ID": "demo",
        "User_Password": "demo",
        "Pickup_Date": "2019-01-10",
        "Sender": "ESHOP",
        "Recipient_Name": "TEST RECIPIENT",
        "Recipient_Address": "P. RALLI",
        "Recipient_Address_Number": 45,
        "Recipient_Zipcode": 17778,
        "Recipient_Region": "TAVROS",
        "Recipient_Phone": 2115005000,
        "Recipient_Cell_Phone": 699999999,
        "Recipient_Floor": null,
        "Recipient_Company_Name": null,
        "Recipient_Country": "GR",
        "Acs_Station_Destination": null,
        "Acs_Station_Branch_Destination": 1,
        "Billing_Code": "2ΑΘ999999",
        "Charge_Type": 2,
        "Cost_Center_Code": null,
        "Item_Quantity": 1,
        "Weight": 0.5,
        "Dimension_X_In_Cm": null,
        "Dimension_Y_in_Cm": null,
        "Dimension_Z_in_Cm": null,
        "Cod_Ammount": 50.5,
        "Cod_Payment_Way": 0,
        "Acs_Delivery_Products": "COD",
        "Insurance_Ammount": null,
        "Delivery_Notes": null,
        "Appointment_Until_Time": null,
        "Recipient_Email": null,
        "Reference_Key1": null,
        "Reference_Key2": null,
        "With_Return_Voucher": null,
        "Content_Type_ID": null,
        "Language": null
    },
    "ACSExecution_HasError": false,
    "ACSExecutionErrorMessage": "",
    "ACSOutputResponce": {
        "ACSValueOutput": [
            {
                "Voucher_No": " 7227889174",
                "Voucher_No_Return": null,
                "Error_Message": ""
            }
        ],
        "ACSTableOutput": {}
    }
}';

$arrayData = json_decode($jso, true);


 DoRequest($arrayData);

?>
