    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
    <meta charset="utf-8">
<div class="table"align="center" >
  <form action="<?php echo base_url()?>index.php/home/doUpdate" method="post">
  <?php foreach($update as $row){?>
<table class='table' width="" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="" align="left">รุ่น</td>
    <td><input class="checkInput" type="text" name="carBrand" id="carBrand" value="<?php echo $row['carBrand']?>"; />     </tr>
  <tr>
    <td height="">carModel</td>
    <td><input class="checkInput" type="text" name="carModel" id="carModel" value="<?php echo $row['carModel']?>" /></td>
  </tr>
  <tr>
    <td height="">licensePlate</td>
    <td><input class="checkInput" type="text" name="licensePlate" id="licensePlate" value="<?php echo $row['licensePlate']?>" /></td>
  </tr>
  <tr>
    <td height="">color</td>
    <td><input class="checkInput" name="color" id="color" cols="45" rows="5" value="<?php echo $row['color']?>"> </textarea></td>
  </tr>
  <tr>
    <td height="">rentCost</td>
    <td><input class="checkInput" type="number" name="rentCost" id="rentCost" value="<?php echo $row['rentCost']?>" /></td>
  </tr>
  <tr>
    <td height="">carTypeId</td>
    <td><input class="checkInput" type="text" name="carTypeId" id="carTypeId" value="<?php echo $row['carTypeId']?>" /></td>
  </tr>
  
  <td height="">warannty</td>
    <td><input class="checkInput" type="text" name="warannty" id="warannty" value="<?php echo $row['warannty']?>" /></td>
  </tr>
  
 <tr>
    <td height=""></td>
    <td><input class="checkInput" type="hidden" name="carId" id="carId" value="<?php echo $row['carId']?>" />
    <input type="submit" name="Add" id="Add" value="SAve"  /></td>
  </tr>
</table><?php } ?>
</form>

