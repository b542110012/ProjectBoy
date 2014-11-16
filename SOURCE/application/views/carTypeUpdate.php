    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
	<meta charset="utf-8">
<div class="table"align="center" >
  <form action="<?php echo base_url()?>index.php/home/doUpdateCarType" method="post">
  <?php foreach($update as $row){?>
<table class='table' width="" border="0" cellspacing="0" cellpadding="0">

  	<tr>
    	<td height="" align="left">ชื่อ</td>
    	<td><input class="checkInput" type="text" name="name" id="name" value="<?php echo $row['name']?>"; />
   	</tr>
   
  	<tr>
    	<td height="">รายละเอียด</td>
    	<td><input class="checkInput" type="text" name="detail" id="detail" value="<?php echo $row['detail']?>" /></td>
  	</tr>
      
  <tr>
    <td height=""></td>
    <td><input class="checkInput" type="hidden" name="carTypeId" id="carTypeId" value="<?php echo $row['carTypeId']?>" />
    <input type="submit" name="Add" id="Add" value="SAve"  /></td>
  </tr>
</table><?php } ?>
</form>

