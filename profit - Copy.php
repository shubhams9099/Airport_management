<?php
	include 'connection.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shops</title>
	<link rel="Stylesheet" href=effect2.css>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<ul>
			<font color="white"><h3>&nbspProfit of Shops&nbsp</h3></font>
		</ul>
	</nav>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<br>
		<br>
		<div class="container">
			<div class="form-group">
				<table>
				<tr>
				<td><label>Shop no:</label></td>
				<td><input type="text" name="sno" placeholder="S#" value="<?php if(isset($_POST['sno'])) echo $_POST['sno']; ?>" required><br></td>
				</tr>
				<tr>
				<td><label>Airport ID:</label></td>
				<td><input type="text" name="aid" placeholder="A101" value="<?php if(isset($_POST['aid'])) echo $_POST['aid']; ?>" required><br></td>
				</tr>
				</table>
				<br>
				
				<button type="submit" name="submit" class="btn btn-primary">Find</button>	
			</div>
		
	</form>
	<?php
		if(isset($_SESSION['acc']) || isset($_SESSION['admin']))
		{


		if(array_key_exists('submit', $_POST))
		{
			$sno=$_POST['sno'];
			$aid=$_POST['aid'];
			$query=mysqli_query($conn,"select * from shops where shop_number='$sno' and airport_id='$aid'");
				if(mysqli_num_rows($query)==0)
				{
					$message = "PLEASE ENTER THE VALID SHOP ID AND AIRPORT ID";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
			else
			{
			$query=mysqli_query($conn,"select * from shops where shop_number='$sno' and airport_id='$aid'");
			$row=mysqli_fetch_array($query);
			$name=$row['NAME'];
			$shop_number=$row['SHOP_NUMBER'];
			$type=$row['TYPE'];
			$aid=$row['AIRPORT_ID'];
			$rent=$row['RENT'];
			$revenue=$row['REVENUE'];
			$profit=$revenue-$rent;
			echo "<br>"."<br>";
			echo "<table style=width:80% border=2 align=left bgcolor=#D7DBDD class=table-hover>";
			echo "<tr bgcolor=#909497>";
			echo "<th>"."NAME"."</th>";
			echo "<th>"."RENT"."</th>";
			echo "<th>"."SHOP_NUMBER"."</th>";
			echo "<th>"."TYPE"."</th>";
			echo "<th>"."REVENUE"."</th>";
			echo "<th>"."AIRPORT_ID"."</th>";
			echo "<th>"."PROFIT"."</th>";
			echo "</tr>";
		
			echo "<tr>";
				echo "<td>".$name."</td>"."<td>".$rent."</td>"."<td>".$shop_number."</td>"."<td>".$type."</td>"."<td>".$revenue."</td>"."<td>".$aid."</td>"."<td>".$profit."</td>";
			echo "</tr>";
			echo "</table>";
			
			}
		}
	}
	else
	{
		echo "<script>location.href='project.php'</script>";
	}
	?>
</div>
</body>
</html>