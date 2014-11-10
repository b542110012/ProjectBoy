<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>test</title>
<script src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
<script>
	$(document).ready(function(){
	
        	$('#button').click(function(event) {
				event.preventDefault();
				var href = $('#link').attr('href');
				
                $('.g').hide('slow');
				$(this).val('พ่อง');
            });
			
			$('.menu').click(function(event) {
				event.preventDefault();
				var href = $(this).attr('href');
				$('#pppp').load(href);
				
			});
			
    });
</script>

<script>

function test(aaa){
	var a = aaa.value;
alert (a);
}

function qqq(){

	var a = document.getElementById('1').value;
	var b = document.getElementById('2').value;
	var c = document.getElementById('3').value;
if(a!=''&&b!=''&&c!=''){
 return true;
}
else{
 return false;
}
}


function cccc(aaa){
	var a = aaa.value;

document.getElementById('3').value = a;
document.getElementById('pppp').innerHTML = a;
}

</script>


</head>

<body>
<a href="google.com" class="menu" onClick="return qqq();" >tgyhujikol</a>

<a href="<?php echo base_url();?>index.php/Welcome/test" class="menu" onClick="return qqq();" >tgyhujikol</a>
<br><br>
<form name="form1" method="post" action="GOOGLE.COM" onSubmit="return qqq();">
  <input type="button" name="button" id="button" value="Submit">
</form>
<br><br>
<input type="text" name="textfield" class="g" id="1" onKeyUp="cccc(this)">
<br><br>
<input type="text" name="textfield" class="g" id="2" >
<br><br>
<input type="text" name="textfield" class="g" id="3" >

<table width="200" border="1">

<div id="pppp">

</div>
</table>
</body>
</html>
