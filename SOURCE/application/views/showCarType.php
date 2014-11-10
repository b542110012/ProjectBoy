    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
	<meta charset="utf-8">
<div class="table"align="center" >
<form id="form1" name="form1" method="post" action="<?php echo base_url()?>index.php/home/searchDataCarType">
<table class="table" width="" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
      <input type="text" name="keyword" id="keyword" />
    </td>
    <td><input name="submit" type="submit" value="ค้นหา"/></td></form>
    
    
    <form id="form1" name="form1" method="post" action="<?php echo base_url()?>index.php/home/addCarType">
    	<td><input name="submit" type="submit" value="เพิ่มข้อมูลประเภทรถ"/></td>
	</form>
  </tr>
</table>


<table class="table" width="" border="1" cellpadding="0" cellspacing="0" id="8">

  <tr>
  	<td width="">id</td>
    <td width="">ชื่อประเภท</td>
    <td width="">รายละเอียด</td>
    <td width="">แก้ไข</td>
    <td width="">ลบ</td>
  </tr>
  <?php foreach($showAll as $row){?>
  <tr>
  	<td><?php echo $row['carTypeId'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['detail'];?></td>

    <td><a class="popupLoad" name="update" href="<?php echo base_url();?>index.php/home/upDateCarType/<?php echo $row['carTypeId'];?>" class="submenu" title="home">แก้ไข</a> </td>
    <td><a class="popupLoad" name="update" href="<?php echo base_url()?>index.php/home/doDeleteCarType/<?php echo $row['carTypeId'];?>">ลบ</a></td>
  </tr>
  <?php } ?>
</table>

