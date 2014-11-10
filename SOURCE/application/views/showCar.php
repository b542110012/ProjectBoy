  <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
<script>
	$(document).ready(function(){			
			$('.menus').click(function(event) {  //. = class  ,,,,    # = id
				event.preventDefault();
				var href = $(this).attr('href');
				$('#box').load(href);
				
			});
			
    	});
	</script>
    

<div class="table"align="center" >
<form id="form1" name="form1" method="post" action="<?php echo base_url()?>index.php/home/searchData">
<table  class="table" width="" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><input type="text" name="keyword" id="keyword" /></td>
    <td><input name="submit" type="submit" value="ค้นหา"/></td></form>
    
    <td>
    <a class="menus" href="<?php echo base_url()?>index.php/home/addCar">เพิ่มข้อมูลรถ</a>    
    </td>
 
	</form>
  </tr>
</table>


<table  class="table" width="" border="1" cellpadding="0" cellspacing="0" id="8"align="center">

  <tr>
  	<td width="">id</td>
    <td width="">ยี่ห้อ</td>
    <td width="">รุ่น</td>
    <td width="">ทะเบียน</td>
    <td width="">สี</td>
    <td width="">ราคาเช่า</td>
    <td width="">ประเภทรถ</td>
    <td width="">หมายเลขประกันภัย</td>
    <td width="">สถานะ</td>
    <td width="">แก้ไข</td>
    <td width="">ลบ</td>
  </tr>
  <?php foreach($showAll as $row){?>
  <tr>
  	<td><?php echo $row['carId'];?></td>
    <td><?php echo $row['carBrand'];?></td>
    <td><?php echo $row['carModel'];?></td>
    <td><?php echo $row['licensePlate'];?></td>
    <td><?php echo $row['color'];?></td>
    <td><?php echo $row['rentCost'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['warannty'];?></td>
    <td><?php echo $row['rentStatus'];?></td>
    <td><a class="popupLoad" name="update" href="<?php echo base_url();?>index.php/home/upDate/<?php echo $row['carId'];?>" class="submenu" title="home">แก้ไข</a> </td>
    <td><a class="popupLoad" name="update" href="<?php echo base_url()?>index.php/home/doDelete/<?php echo $row['carId'];?>">ลบ</a></td>
  </tr>
  <?php } ?>
</table>

