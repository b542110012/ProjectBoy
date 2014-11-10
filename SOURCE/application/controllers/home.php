<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function index()
	{
		$this->load->view('homeAdmin');
	}
	function test(){
		$this->load->view('555555');
	}
	//////////      CAR      /////////////
	function showAll(){
		$data['showAll'] = $this->Car->showAllData();
		$this->load->view('showCar',$data);
	}
	
	function addCar(){
		$data['carType'] = $this->CarType->showAllData();
		$this->load->view('addCar',$data);
	}
	
	function addCarAction(){
		$carBrand 		= $this->input->post('carBrand');
		$carModel 		= $this->input->post('carModel');
		$licensePlate 	= $this->input->post('licensePlate');
		$color 			= $this->input->post('color');
		$rentCost 		= $this->input->post('rentCost');
		$carTypeId 		= $this->input->post('carTypeId');
		$warannty 		= $this->input->post('warannty');
		
		
			$this->Car->setCarBrand($carBrand);
			$this->Car->setCarModel($carModel);
			$this->Car->setLicensePlate($licensePlate);
			$this->Car->setColor($color);
			$this->Car->setRentCost($rentCost);
			$this->Car->setCarTypeId($carTypeId);
			$this->Car->setWarannty($warannty);
			
			$this->Car->addCarData();
			
		
				echo "<center>การเพิ่มข้อมูลสำเร็จ<br>";
	}
	
	function searchData(){
		$keyword = $this->input->post('keyword');
        $data['showAll'] = $this->Car->searchData($keyword);
        $this->load->view('showCar',$data);
	}
	
	function upDate($carId){
		$data['update']= $this->Car->updateCar($carId);
		$this->load->view('carUpdate',$data);
		}
		
	function doUpdate()
	{
		$this->Car->setCarId($this->input->post('carId'));
		$this->Car->setCarBrand($this->input->post('carBrand'));
		$this->Car->setCarModel($this->input->post('carModel'));
		$this->Car->setLicensePlate($this->input->post('licensePlate'));
		$this->Car->setColor($this->input->post('color'));
		$this->Car->setRentCost($this->input->post('rentCost'));
		$this->Car->setCarTypeId($this->input->post('carTypeId'));
		$this->Car->setWarannty($this->input->post('warannty'));
		$this->Car->setRentStatus($this->input->post('rentStatus'));
		
		$this->Car->upDateCar2();
		echo "upDateCar2 OKOK";
	}
	
	function doDelete($carId)
	{    
		$this->Car->delete($carId);
		echo "OK";
	}
	///////////////////    CarType    ////////////////////
	
	function showAllCarTypeData(){
		$data['showAll'] = $this->CarType->showAllData();
		$this->load->view('showCarType',$data);
	}
	
	function addCarType(){
		$this->load->view('addCarType');
	}
	
	function addCarTypeAction(){
		$name 		= $this->input->post('name');
		$detail 	= $this->input->post('detail');
	
			$this->CarType->setName($name);
			$this->CarType->setDetail($detail);

					$this->CarType->addCarTypeData();
			
		
				echo "<center>การเพิ่มข้อมูลสำเร็จ<br>";
	}
	
	function upDateCarType($carTypeId){
		$data['update']= $this->CarType->updateCarType($carTypeId);
		$this->load->view('carTypeUpdate',$data);
		}
	function doUpdateCarType()
	{
		$this->CarType->setCarTypeId($this->input->post('carTypeId'));
		$this->CarType->setName($this->input->post('name'));
		$this->CarType->setDetail($this->input->post('detail'));
		

							
		$this->CarType->upDateCarType2();
		echo "OKOK";
	}
	
	function doDeleteCarType($carTypeId)  ///  if havr reference to car canot delete
	{   
	 	$this->db->like('carTypeId', $carTypeId);
		$this->db->from('car');
		$count = $this->db->count_all_results();
	
		if($count==0){
			$this->CarType->deleteCarType($carTypeId);
			echo "OK";
			}
		else{
			echo 'ไม่สามารถทำรายการได้';
			}
		
	}
	
	function searchDataCarType(){
		$keyword = $this->input->post('keyword');
        $data['showAll'] = $this->CarType->searchDataCarType($keyword);
        $this->load->view('showCarType',$data);
	}
 }
