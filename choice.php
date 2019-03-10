<?php include'connection.php';
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="Stylesheet" href=effect2.css>
	<title>Welcome</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<style>
/* The alert message box */
.alert {
    padding: 20px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 15px;
}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<ul>
			<font color="white"><h3>&nbspFunctions&nbsp</h3></font>
		</ul>
		<ul class="navbar-nav ml-auto">
			<a href ='admin_logout.php'><button style="width:auto;">Log Out</button></a>
		</ul>
</nav>
<br>	
<br>	
<br>	
<br>	
<div align="center">
	<?php
		echo "<h4>"."Welcome ".$_SESSION['uname']."</h4>";
	?>
	<br>
	<br>
	<br>
	<br>
	<table width=60%>	
	<tr>
		<td>
			<?php
				if(isset($_SESSION['cust']))
				{
					echo "<a href='ticket_booking.php' target='_blank'>";	
				}
				else
				{
					echo "<a href='choice.php'>";
				}
			?>
			<input type='button' class='btn bg-dark' style="height: 200px; width: 200px; background-color:#D7DBDD; font-size:18pt;" value='Ticket Booking'>
				</a>			
		</td>
		<td>
			<?php
				
				if(isset($_SESSION['acount']) || isset($_SESSION['admin']))
				{
					echo "<a href='salary_update.php' target='_blank'>";	
				}
				else
				{
					
					echo "<a href='choice.php'>";
				}
			?>
			<input type="button" class="btn  bg-dark"  style="height: 200px; width: 200px; background-color:#0fae99; font-size:18pt;" value="Salary Update"></a>
		</td>
		<td>
			<?php
				if(isset($_SESSION['fuel']) || isset($_SESSION['admin']))
				{
					echo "<a href='fuel_update.php' target='_blank'>";	
				}
				else
				{
					echo "<a href='choice.php'>";
				}
			?>
			<input type="button" class="btn  bg-dark"  style="height: 200px; width: 200px; background-color:#0fae99;font-size:18pt;" value="Fuel Update"></a>
		</td>
		<td>
			<?php
				if(isset($_SESSION['admin']))
				{
					echo "<a href='profit.php' target='_blank'>";	
				}
				else
				{
					echo "<a href='choice.php'>";
				}
			?>
			<input type="button" class="btn  bg-dark" style="height: 200px; width: 200px; background-color:#0fae99; font-size:18pt;" value="Shops Profit"></a>	
		</td>
	</tr>
</table>
</div>
</body>
</html>