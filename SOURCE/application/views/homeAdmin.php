<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Boy Car For Rent</title>
    
    <!-- JS -->
    <script src="<?php echo base_url();?>js/jquery-1.11.1.min.js?1001"></script>
    <script>
	$(document).ready(function(){			
			$('.menu').click(function(event) {  //. = class  ,,,,    # = id
				event.preventDefault();
				var href = $(this).attr('href');
				$('#box').load(href);
				
			});
			
    	});
	</script>
    
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
	<link rel="stylesheet"  href="<?php echo base_url();?>css/header.css">
    <link rel="stylesheet"  href="<?php echo base_url();?>css/box.css">
<style type="text/css">

body {
	margin-left: 00px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<body>
	<header>
    		<ul>
            	<li>
               	<a class="menu" href="<?php echo base_url();?>index.php/home/test"><p align="center">สร้างรายการเช่า</p></a>
                </li>
                
                <li>
                <a class="menu" href="<?php echo base_url();?>index.php/home/showAll"><p align="center">จัดการข้อมูลรถ</p></a>
                </li>
               
                <li>
                <a class="menu" href="<?php echo base_url();?>index.php/home/showAllCarTypeData"><p align="center">จัดการประเภทรถ</p></a>
                </li>
                
                <li>
                <a class="menu" href="#"><p align="center">จัดการข้อมูลประเภทรถ</p></a>
                </li>
                
                <li>
                <a class="menu" href="#"><p align="center">รายงาน</p></a>
                </li>
            </ul>
	</header>
    
    <div id="box">
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    
    
</body>
	
    <footer>
    Footer Message
    </footer>
</html>