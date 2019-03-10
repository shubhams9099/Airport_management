<?php
	include 'connection.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Salary Update</title>
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
			<font color="white"><h3>&nbspUpdate Salary&nbsp</h3></font>
		</ul>
	</nav>

	<div class="container">
		
	<form id="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<br>
		<br>
		<br>
		<div class="form-group">
		<label>Enter the ID:</label>
		<input type="text" name="id" class="form-control" placeholder="I#" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>" required></br>
		<label>Enter the Salary per day</label>
		<input type="text" name="const" class="form-control" placeholder="amount" value="<?php if(isset($_POST['const'])) echo $_POST['const']; ?>" required></br>
		<label>Enter the Airport ID:</label>
		<input type="text" name="aid" class="form-control" placeholder="A#" value="<?php if(isset($_POST['aid'])) echo $_POST['aid']; ?>" required></br>
		<button type="submit" name="submit" class="btn btn-primary">Update</button> 
		</div>
	</form>
<?php
	if(filter_has_var(INPUT_POST, 'submit'))
	{
		$id=htmlspecialchars($_POST['id']);
		$const=htmlspecialchars($_POST['const']);
		$aid=htmlspecialchars($_POST['aid']);
		$query2=mysqli_query($conn,"select c.ID,c.PRESENT_DAYS,c.AIRPORT_ID,c.SALARY from CREW c where c.ID='$id' and c.AIRPORT_ID='$aid'");
		if(mysqli_num_rows($query2)==0)
				{
					$message = "PLEASE ENTER THE VALID CREW MEMBER DETAILS";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				else
				{
					$query2=mysqli_query($conn,"select c.ID,c.PRESENT_DAYS,c.AIRPORT_ID,c.SALARY from CREW c where c.ID='$id' and c.AIRPORT_ID='$aid'");
					$row=mysqli_fetch_array($query2);
					$present_days=$row['PRESENT_DAYS'];
					$salary=$const*$present_days;
					$sql=mysqli_query($conn,"update crew set SALARY ='$salary' where ID='$id'");
				    echo "<h4>"."Record updated successfully"."</h4>";
				}
	}
?>
	</div>
</body>
</html>
