<!DOCTYPE html>
<html lang="en">

	<script language="javascript" type="text/javascript">
		window.history.forward(1);
		document.attachEvent("onkeydown", my_onkeydown_handler);
		function my_onkeydown_handler()
		{
			switch (event.keyCode)
			{
				case 116 : // 'F5'
				event.returnValue = false;
				event.keyCode = 0;
				//window.status = "We have disabled F5";
				break;
			}
		} 
			document.onmousedown=disableclick;
			status="Right Click is not allowed";
			function disableclick(e)
			{
				if(event.button==2)
				{
					alert(status);
					return false;	
				}
			}
	</script> 

<style>
	body{
		font-family: verdana; 
		font-size: 18px; 
	}
	p{
		font-family: consolas; 
		font-size: 14px
	}
	{
		color: #076fd0}
	:visited{
		color: #076fd0
	}	
	th, td {
	    padding: 10px;
	}
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	}
	h3, th{
		color:orange;
	}
	input{
		padding: 10px;
		background: orange;
		font-size: 20px;
		color: white;
		width: 100%;
	}
</style>
<h3 align="center">Monitoring Backlog OCS</h3>

</body>
	<form action="hasil.php" method="post">
		<table align="center" style="width:100%">
			<tr>
				<th>Site 1</th>
				<th>Site 2</th>
			</tr>
			<tr>
				<td><textarea minlength="200" name="bc1" id="" cols="89" placeholder="Masukan alert Backlog" rows="9"></textarea></td>
				<td><textarea minlength="200" name="bc2" id="" cols="89" placeholder="Masukan alert Backlog" rows="9"></textarea></td>
			</tr>
			<tr>
				<th>Site 3</th>
				<th>Site 4</th>
			</tr>
			<tr>
				<td><textarea minlength="200" name="bc3" id="" cols="89" placeholder="Masukan alert Backlog" rows="9"></textarea></td>
				<td><textarea minlength="200" name="bc4" id="" cols="89" placeholder="Masukan alert Backlog" rows="9"></textarea></td>
			</tr>
			<tr>
				<th>Site 5</th>
				<th>Site 6</th>
			</tr>
			<tr>
				<td><textarea minlength="200" name="bc5" id="" cols="89" placeholder="Masukan alert Backlog" rows="9"></textarea></td>
				<td><textarea minlength="200" name="bc6" id="" cols="89" placeholder="Masukan alert Backlog" rows="9"></textarea></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Check Backlog"></td>
			</tr>
		</table>
		
	</form>
</body>
<h4 align="center"><a href="log.txt" target="_blank">History Backlog</a> | <a href="current.php" target="_blank">Current Status</a></h4>
<footer><br><br>
	<p style="color:grey" align="center">Risky Muaji © 2015</p>	
</footer>
</html>