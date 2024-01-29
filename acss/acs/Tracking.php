<?php 


class Tracking {
    protected $jsonData; 
    protected $jsondec;

    function ShowTracking(){
        $this->jsonData =  file_get_contents('php://input');

        $this->jsondec  =  SetBeforeReq($this->jsonData);
      
        DoRequest($this->jsondec);         
    }
}