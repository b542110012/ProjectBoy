<?php 
class Customer extends CI_Model {


######  Attribute  ###### 
    var $cusId ; ######  รหัสลูกค้า  ######
    var $cusName ; ######  ชื่อนามสกุล  ######
    var $cusAddress ; ######  ที่อยู่  ######
    var $cusTel ; ######  เบอร์โทรศัพท์  ######
    var $cusEmail ; ######  อีเมล  ######
    var $carDriverLicense ; ######  ใบขับขี่รถยนต์  ######
    var $bikeDriverLicense ; ######  ใบขับขี่รถจักยานยนต์  ######
###### End Attribute  ###### 

 ###### SET : $cusId ######
    function setCusId($cusId){
        $this->cusId = $cusId; 
     }
###### End SET : $cusId ###### 


###### GET : $cusId ######
    function getCusId(){
        return $this->cusId; 
     }
###### End GET : $cusId ###### 


 ###### SET : $cusName ######
    function setCusName($cusName){
        $this->cusName = $cusName; 
     }
###### End SET : $cusName ###### 


###### GET : $cusName ######
    function getCusName(){
        return $this->cusName; 
     }
###### End GET : $cusName ###### 


 ###### SET : $cusAddress ######
    function setCusAddress($cusAddress){
        $this->cusAddress = $cusAddress; 
     }
###### End SET : $cusAddress ###### 


###### GET : $cusAddress ######
    function getCusAddress(){
        return $this->cusAddress; 
     }
###### End GET : $cusAddress ###### 


 ###### SET : $cusTel ######
    function setCusTel($cusTel){
        $this->cusTel = $cusTel; 
     }
###### End SET : $cusTel ###### 


###### GET : $cusTel ######
    function getCusTel(){
        return $this->cusTel; 
     }
###### End GET : $cusTel ###### 


 ###### SET : $cusEmail ######
    function setCusEmail($cusEmail){
        $this->cusEmail = $cusEmail; 
     }
###### End SET : $cusEmail ###### 


###### GET : $cusEmail ######
    function getCusEmail(){
        return $this->cusEmail; 
     }
###### End GET : $cusEmail ###### 


 ###### SET : $carDriverLicense ######
    function setCarDriverLicense($carDriverLicense){
        $this->carDriverLicense = $carDriverLicense; 
     }
###### End SET : $carDriverLicense ###### 


###### GET : $carDriverLicense ######
    function getCarDriverLicense(){
        return $this->carDriverLicense; 
     }
###### End GET : $carDriverLicense ###### 


 ###### SET : $bikeDriverLicense ######
    function setBikeDriverLicense($bikeDriverLicense){
        $this->bikeDriverLicense = $bikeDriverLicense; 
     }
###### End SET : $bikeDriverLicense ###### 


###### GET : $bikeDriverLicense ######
    function getBikeDriverLicense(){
        return $this->bikeDriverLicense; 
     }
###### End GET : $bikeDriverLicense ###### 


function addCustomerData(){
		$data = array(
		'cusName' 			=> $this->getCusName(),
		'cusAddress' 		=> $this->getCusAddress(),
		'cusTel' 			=> $this->getCusTel(),
		'cusEmail' 			=> $this->getCusEmail(),
		'carDriverLicense' 	=> $this->getCarDriverLicense(),
		'bikeDriverLicense' => $this->getBikeDriverLicense(),
		);
		$this->db->insert('customer',$data);
		//return $this->db->insert_id();
	}
}
?>