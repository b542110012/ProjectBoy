    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
<div class="table"align="center" >
<form class='menu' action="<?php echo base_url();?>index.php/home/addCarAction" method="post">
  <table class="table" width="40%" border="0" align="center" cellpadding="7" cellspacing="3">    
 <tr>   
    <th colspan="2" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>เพิ่มข้อมูลรถ</p></th>
   	</tr>

    <tr>    
       	<td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ยี่ห้อ</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input name="carBrand" id="carBrand" ></p></td>

   
    </tr>
         <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รุ่น</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input name="carModel" id="carModel" ></p></td>
    </tr>
    
     <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ทะเบียน</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input name="licensePlate" id="licensePlate" ></p></td>
    </tr>
    
         <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>สี</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input name="color" id="color" ></p></td>
    </tr>
    
         <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ราคาเช่า</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input type="number" name="rentCost" id="rentCost" ></p></td>
    </tr>
    
<td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ประเภทรถ</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
   		  <select name="carTypeId" id="carTypeId">
   		    <?php foreach($carType as $type){ ?>
            <option value="<?php echo $type['carTypeId'] ?>"><?php echo $type['name'] ?></option>
             <?php } ?>
 		    </select>
   		</p></td>
    </tr>
    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>หมายเลขกรมธรรม์</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input type="number" name="warannty" id="warannty" ></p></td>
    </tr>

  <tr>    
           <td colspan="2" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
             <input type="submit" name="save" id="save" value="บันทึก">
             &nbsp;&nbsp;
             <input type="button" name="cancle" id="cancle" onClick="parent.jQuery.fancybox.close();" value="ยกเลิก">
           </p></td>  
    </tr>
</table>
</form>
</div>

