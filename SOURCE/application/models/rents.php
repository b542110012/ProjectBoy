<?php 
class Rents extends CI_Model {


######  Attribute  ###### 
    var $rentId ; ######  รหัสการเช่า  ######
    var $cusId ; ######  รหัสลูกค้า  ######
    var $carId ; ######  รหัสรถ  ######
    var $dateRent ; ######  วันเช่า  ######
    var $dateReturn ; ######  วันคืน  ######
    var $pledge ; ######  ค่ามัดจำ  ######
    var $cash ; ######  ค่าเช่าสุทธิ  ######
    var $rentStatus ; ######  สถานะการเช่า  ######
###### End Attribute  ###### 

 ###### SET : $rentId ######
    function setRentId($rentId){
        $this->rentId = $rentId; 
     }
###### End SET : $rentId ###### 


###### GET : $rentId ######
    function getRentId(){
        return $this->rentId; 
     }
###### End GET : $rentId ###### 


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


 ###### SET : $carId ######
    function setCarId($carId){
        $this->carId = $carId; 
     }
###### End SET : $carId ###### 


###### GET : $carId ######
    function getCarId(){
        return $this->carId; 
     }
###### End GET : $carId ###### 


 ###### SET : $dateRent ######
    function setDateRent($dateRent){
        $this->dateRent = $dateRent; 
     }
###### End SET : $dateRent ###### 


###### GET : $dateRent ######
    function getDateRent(){
        return $this->dateRent; 
     }
###### End GET : $dateRent ###### 


 ###### SET : $dateReturn ######
    function setDateReturn($dateReturn){
        $this->dateReturn = $dateReturn; 
     }
###### End SET : $dateReturn ###### 


###### GET : $dateReturn ######
    function getDateReturn(){
        return $this->dateReturn; 
     }
###### End GET : $dateReturn ###### 


 ###### SET : $pledge ######
    function setPledge($pledge){
        $this->pledge = $pledge; 
     }
###### End SET : $pledge ###### 


###### GET : $pledge ######
    function getPledge(){
        return $this->pledge; 
     }
###### End GET : $pledge ###### 


 ###### SET : $cash ######
    function setCash($cash){
        $this->cash = $cash; 
     }
###### End SET : $cash ###### 


###### GET : $cash ######
    function getCash(){
        return $this->cash; 
     }
###### End GET : $cash ###### 


 ###### SET : $rentStatus ######
    function setRentStatus($rentStatus){
        $this->rentStatus = $rentStatus; 
     }
###### End SET : $rentStatus ###### 


###### GET : $rentStatus ######
    function getRentStatus(){
        return $this->rentStatus; 
     }
###### End GET : $rentStatus ###### 

}
?>