<?php
	include 'connection.php';
//	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fuel_Update</title>
	<link rel="Stylesheet" href=effect2.css>
</head>
<style type="text/css">
	body{
background-color: #F0F3F4;
}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<ul>
			<font color="white"><h3>&nbspUpdate Fuel Avaibility &nbsp</h3></font>
		</ul>
	</nav>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<br>
		<br>
		<div class="container">
		<div class="form-group">
		<label>Enter the fuel name :</label>
		<input type="text" name="fname" placeholder="JET-#" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"required><br>
		<label>Enter the amount of Fuel :</label>
		<input type="text" name="amount" placeholder="(IN LITRES)" value="<?php if(isset($_POST['amount'])) echo $_POST['amount']; ?>"required><br>
		<label>Enter the Airport ID :</label>
		<input type="text" name="aid" placeholder="A101" value="<?php if(isset($_POST['aid'])) echo $_POST['aid']; ?>"required><br>
		<button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
		</div>
	</form>
	<?php	
		if(array_key_exists('submit', $_POST))
		{
			if(isset( $_POST['fname'],$_POST['amount'],$_POST['aid'] ))
			{
			$fuel_name=$_POST['fname'];
			$amount=$_POST['amount'];
			$aid=$_POST['aid'];
			$query=mysqli_query($conn,"select * from fuel where FUEL_NAME='$fuel_name' and AIRPORT_ID='$aid'");			
			$row=mysqli_fetch_array($query);
			$a=$row['AVAILABLITY'];
			if($amount>$a)
			{
				$message = "Sorry this Fuel is not available ";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else
			{
				$a=$a-$amount;
				echo $a;
				$query=mysqli_query($conn,"update fuel set AVAILABLITY='$a' where FUEL_NAME='$fuel_name' and AIRPORT_ID='$aid'");
				echo "<br>"."<h4>"."Data Updated Sucessfully"."</h4>";
			}
			}
			else
			{
				$message = "PLEASE ENTER VALID DATA !!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	?>
		</div>
</body>
</html>