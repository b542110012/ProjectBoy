<?php 
class User extends CI_Model {


######  Attribute  ###### 
    var $userId ; ######  รหัสผู้ใช้งาน  ######
    var $name ; ######  ชื่อ สกุล  ######
    var $birthDate ; ######  วันเกิด  ######
    var $phone ; ######  เบอร์โทรศัพท์  ######
    var $email ; ######  อีเมล  ######
    var $address ; ######  ที่อยู่  ######
    var $userName ; ######  ชื่อเข้าใช้ระบบ  ######
    var $password ; ######  รหัสผ่าน  ######
    var $status ; ######  สถานะบัญชี  ######
###### End Attribute  ###### 

 ###### SET : $userId ######
    function setUserId($userId){
        $this->userId = $userId; 
     }
###### End SET : $userId ###### 


###### GET : $userId ######
    function getUserId(){
        return $this->userId; 
     }
###### End GET : $userId ###### 


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


 ###### SET : $birthDate ######
    function setBirthDate($birthDate){
        $this->birthDate = $birthDate; 
     }
###### End SET : $birthDate ###### 


###### GET : $birthDate ######
    function getBirthDate(){
        return $this->birthDate; 
     }
###### End GET : $birthDate ###### 


 ###### SET : $phone ######
    function setPhone($phone){
        $this->phone = $phone; 
     }
###### End SET : $phone ###### 


###### GET : $phone ######
    function getPhone(){
        return $this->phone; 
     }
###### End GET : $phone ###### 


 ###### SET : $email ######
    function setEmail($email){
        $this->email = $email; 
     }
###### End SET : $email ###### 


###### GET : $email ######
    function getEmail(){
        return $this->email; 
     }
###### End GET : $email ###### 


 ###### SET : $address ######
    function setAddress($address){
        $this->address = $address; 
     }
###### End SET : $address ###### 


###### GET : $address ######
    function getAddress(){
        return $this->address; 
     }
###### End GET : $address ###### 


 ###### SET : $userName ######
    function setUserName($userName){
        $this->userName = $userName; 
     }
###### End SET : $userName ###### 


###### GET : $userName ######
    function getUserName(){
        return $this->userName; 
     }
###### End GET : $userName ###### 


 ###### SET : $password ######
    function setPassword($password){
        $this->password = $password; 
     }
###### End SET : $password ###### 


###### GET : $password ######
    function getPassword(){
        return $this->password; 
     }
###### End GET : $password ###### 


 ###### SET : $status ######
    function setStatus($status){
        $this->status = $status; 
     }
###### End SET : $status ###### 


###### GET : $status ######
    function getStatus(){
        return $this->status; 
     }
	 
	 
	 function addUserData(){
		$data = array(
		'name' 			=> $this->getName(),
		'birthDate' 	=> $this->getBirthDate(),
		'phone' 		=> $this->getPhone(),
		'email' 		=> $this->getEmail(),
		'address' 		=> $this->getAddress(),
		'userName' 		=> $this->getUserName(),
		'password' 		=> $this->getPassword(),
		'status' 		=> $this->getStatus()
		);
		$this->db->insert('user',$data);
		//return $this->db->insert_id();
	}
	
	
	function login()
 {
   $this -> db -> select('*');  						###########
   $this -> db -> from('user'); 						 ########### เช็คข้อมูลใน DB 
   $this -> db -> where('username', $this->getUserName()); ###########
   $this -> db -> where('password', md5($this->getPassword())); ###########
   $this -> db -> limit(1); ############## ตำกัดให้คืนค่าแค่ record เดียว

   $query = $this -> db -> get(); ##############  สั่งดึงข้อมูลตามเงื่อนไข

   if($query -> num_rows() == 1)  ############  เมื่อมีข้อมูล 1 record 
   {
     return $query->result(); ############# ส่งค้าที่ดึงได้กลับ
   }
   else ########### เมื่อไม่ตรงตามเงื่อนไข
   {
		  return FALSE;  ############# ส่งค้า FALSE กลับ

   }
 }
 ######################## end function login #############################
 
 function showAllUserData(){
		$query = $this->db->get('user')->result_array();
		return $query;
	}
	
	function deleteUser($userId)
	{
	$this->db->from('user');
	$this->db->where('user.userId',$userId);
	if	($this->db->delete())
		{
		echo "OK";
		}
	else
		{
		echo "FAIL";
		}
	}
	
	
	function updateUser($userId)
	{
		$this->db->where('user.userId', $userId);
		$query = $this->db->get('user')->result_array();
		return $query;
	}
	function upDateUser2()
	{
		$data = array( 
		
					   'userId'			=> $this->getUserId(),
					   'name'			=> $this->getName(),
					   'birthDate' 		=> $this->getBirthDate(),
					   'phone' 			=> $this->getPhone(),
					   'email' 			=> $this->getEmail(),
					   'address' 		=> $this->getAddress(),
					   'userName' 		=> $this->getUserName(),
					   'password' 		=> $this->getPassword(),
					   'status' 		=> $this->getStatus()
					   
					   
					   
					);
			$this->db->where('user.userId',$this->getUserId());
			$this->db->update('user',$data);
	}
	
	function searchDataUser($keyword)
	{
		$this->db->like('user.userId',$keyword);
		$this->db->or_like('user.name',$keyword);
		$this->db->or_like('user.userName',$keyword);
		$this->db->or_like('user.phone',$keyword);

		$query  =  $this->db->get('user')->result_array();
		return $query;
			
	}
}
?>