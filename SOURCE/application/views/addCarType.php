    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
    <meta charset="utf-8">
<div class="table"align="center" >
<form action="<?php echo base_url();?>index.php/home/addCarTypeAction" method="post">
  <table class='table'width="40%" border="0" align="center" cellpadding="7" cellspacing="3">    
 <tr>   
    <th colspan="2" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>เพิ่มข้อมูลประเภทรถรถ</p></th>
   	</tr>

    <tr>    
       	<td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อประเภท</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input name="name" id="name" ></p></td>

   
    </tr>
         <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รายละเอียด</p></td>  
   		<td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input name="detail" id="detail" ></p></td>
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

