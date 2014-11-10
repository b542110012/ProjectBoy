<?php 
class CarType extends CI_Model {


######  Attribute  ###### 
    var $carTypeId ; ######  รหัสประเภทรถ  ######
    var $name ; ######  ชื่อ  ######
    var $detail ; ######  รายละเอียด  ######
###### End Attribute  ###### 

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


 ###### SET : $name ######
    function setName($name){
        $this->name = $name; 
     }
###### End SET : $name ###### 


###### GET : $name ######
    function getName(){
        return $this->name; 
     }
###### End GET : $name ###### 


 ###### SET : $detail ######
    function setDetail($detail){
        $this->detail = $detail; 
     }
###### End SET : $detail ###### 


###### GET : $detail ######
    function getDetail(){
        return $this->detail; 
     }
###### End GET : $detail ###### 

function addCarTypeData(){
		$data = array(
		'name' 		=> $this->getName(),
		'detail' 	=> $this->getDetail()
		);
		$this->db->insert('carType',$data);
		//return $this->db->insert_id();
	}
	
	function showAllData(){
		$query = $this->db->get('carType')->result_array();
		return $query;
	}
	
	function deleteCarType($carTypeId)
	{
	$this->db->from('carType');
	$this->db->where('carType.carTypeId',$carTypeId);
	if	($this->db->delete())
		{
		echo "OK";
		}
	else
		{
		echo "FAIL";
		}
	}
	
	function updateCarType($carTypeId)
	{
		$this->db->where('carType.carTypeId', $carTypeId);
		$query = $this->db->get('carType')->result_array();
		return $query;
	}
	function upDateCarType2()
	{
		$data = array(
					   'carTypeId'	=> $this->getCarTypeId(),
					   'name' 		=> $this->getName(),
					   'detail' 	=> $this->getDetail()

					);
			$this->db->where('carType.carTypeId',$this->getCarTypeId());
			$this->db->update('carType',$data);
	}
	
	function searchDataCarType($keyword)
	{
		$this->db->like('carType.carTypeId',$keyword);
		$this->db->or_like('carType.name',$keyword);
		$this->db->or_like('carType.detail',$keyword);

		$query  =  $this->db->get('carType')->result_array();
		return $query;
			
	}
}
?>