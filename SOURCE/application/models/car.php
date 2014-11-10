<?php 
class Car extends CI_Model {


######  Attribute  ###### 
    var $carId ; ######  รหัสรถ  ######
    var $carBrand ; ######  ยี่ห้อ  ######
    var $carModel ; ######  รุ่น  ######
    var $licensePlate ; ######  เลขทะเบียน  ######
    var $color ; ######  สี  ######
    var $rentCost ; ######  ราคาเช่า  ######
    var $carTypeId ; ######  รหัสปะเภทรถ  ######
    var $warannty ; ######  หมายเลขประกันภัย  ######
    var $rentStatus ; ######  สถานะรถ  ######
###### End Attribute  ###### 

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


 ###### SET : $carBrand ######
    function setCarBrand($carBrand){
        $this->carBrand = $carBrand; 
     }
###### End SET : $carBrand ###### 


###### GET : $carBrand ######
    function getCarBrand(){
        return $this->carBrand; 
     }
###### End GET : $carBrand ###### 


 ###### SET : $carModel ######
    function setCarModel($carModel){
        $this->carModel = $carModel; 
     }
###### End SET : $carModel ###### 


###### GET : $carModel ######
    function getCarModel(){
        return $this->carModel; 
     }
###### End GET : $carModel ###### 


 ###### SET : $licensePlate ######
    function setLicensePlate($licensePlate){
        $this->licensePlate = $licensePlate; 
     }
###### End SET : $licensePlate ###### 


###### GET : $licensePlate ######
    function getLicensePlate(){
        return $this->licensePlate; 
     }
###### End GET : $licensePlate ###### 


 ###### SET : $color ######
    function setColor($color){
        $this->color = $color; 
     }
###### End SET : $color ###### 


###### GET : $color ######
    function getColor(){
        return $this->color; 
     }
###### End GET : $color ###### 


 ###### SET : $rentCost ######
    function setRentCost($rentCost){
        $this->rentCost = $rentCost; 
     }
###### End SET : $rentCost ###### 


###### GET : $rentCost ######
    function getRentCost(){
        return $this->rentCost; 
     }
###### End GET : $rentCost ###### 


 ###### SET : $carTypeId ######
    function setCarTypeId($carTypeId){
        $this->carTypeId = $carTypeId; 
     }
###### End SET : $carTypeId ###### 


###### GET : $carTypeId ######
    function getCarTypeId(){
        return $this->carTypeId; 
     }
###### End GET : $carTypeId ###### 


 ###### SET : $warannty ######
    function setWarannty($warannty){
        $this->warannty = $warannty; 
     }
###### End SET : $warannty ###### 


###### GET : $warannty ######
    function getWarannty(){
        return $this->warannty; 
     }
###### End GET : $warannty ###### 


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


////////////////////////End SET GET///////////////////////////////////



/////////////////////// Function Zone ////////////////////////////////

	function getCarData($page,$url){
		 $pageValue = 10;///จำนวนข้อมูลต่อ1หน้า
		 $data = $this->session->userdata('loginData'); //// No login now
		 $this->db->join('cartype','cartype.carTypeId = car.carTypeId');
		 $data = $this->db->get('car')->result_array();	
		 return $data;
	}
	
	function addCarData(){
		$data = array(
		'carBrand' 		=> $this->getCarBrand(),
		'carModel' 		=> $this->getCarModel(),
		'licensePlate' 	=> $this->getLicensePlate(),
		'color' 		=> $this->getColor(),
		'rentCost' 		=> $this->getRentCost(),
		'carTypeId' 	=> $this->getCarTypeId(),
		'warannty' 		=> $this->getWarannty()
		);
		$this->db->insert('car',$data);
		//return $this->db->insert_id();
	}
	
	function showAllData(){
		$this->db->join('cartype','cartype.carTypeId = car.carTypeId');
		$query = $this->db->get('car')->result_array();
		return $query;
	}
	
	function delete($carId)
	{
	$this->db->from('car');
	$this->db->where('car.carId',$carId);
	if	($this->db->delete())
		{
		echo "OK";
		}
	else
		{
		echo "FAIL";
		}
	}
	
	
	function updateCar($carId)
	{
		$this->db->where('car.carId', $carId);
		$query = $this->db->get('car')->result_array();
		return $query;
	}
	function upDateCar2()
	{
		$data = array(
					   'carId'			=> $this->getCarId(),
					   'carBrand' 		=> $this->getCarBrand(),
					   'carModel' 		=> $this->getCarModel(),
					   'licensePlate' 	=> $this->getLicensePlate(),
					   'color' 			=> $this->getColor(),
					   'rentCost' 		=> $this->getRentCost(),
					   'carTypeId' 		=> $this->getCarTypeId(),
					   'warannty' 		=> $this->getWarannty()
					);
			$this->db->where('car.carId',$this->getCarId());
			$this->db->update('car',$data);
	}
	
	function searchData($keyword)
	{
		$this->db->like('car.carId',$keyword);
		$this->db->or_like('car.warannty',$keyword);
		$this->db->or_like('car.licensePlate',$keyword);
		$this->db->or_like('car.carModel',$keyword);
		$this->db->or_like('car.carBrand',$keyword);
		$this->db->join('cartype','cartype.carTypeId = car.carTypeId');
		$query  =  $this->db->get('car')->result_array();
		return $query;
			
	}
}
?>