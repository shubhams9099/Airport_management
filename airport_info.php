<?php
	include 'connection.php';
	$msg='';
	$msgClass='';
	if(filter_has_var(INPUT_POST, 'submit')) //search button is submit here
	{
		$aid=htmlspecialchars($_POST['aid']);
		if(!empty($aid))
		{
		}
		else 
		{
			//Show error
			$msg='Please enter a valid airport ID';
			$msgClass='alert-danger';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Project</title>
	<link rel="Stylesheet" href=effect2.css>
</head>
<style type="text/css">
	body
	{
		padding-bottom:80px;
	}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<!---->
			<ul class="navbar-nav mr-auto">
				
				<div class="navbar-header">				
				<a class="navbar-brand" href="project.php"><strong><h4>Home</h4></strong></a>
				</div>
				<li><a class="nav-link" href="details.php"><h4>&nbspDetails&nbsp</h4></a></li>
				<li><a class="nav-link" href="flight_details.php"><h4>&nbspFlight-Info&nbsp</h4></a></li>
				<li><a class="nav-link" href="airport_info.php"><h4>&nbspAirport info&nbsp</h4></a></li>
				<li><a class="nav-link" href="about_us.php"><h4>&nbspAbout us</h4></a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<?php if($msg!='') : ?>
			<div class="alert <?php echo $msgClass; ?>">
				<?php echo $msg; ?>
			</div>
		<?php endif; ?>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<br>
			<div class="form-group">
				<label><h4>Enter the Airport_ID &nbsp &nbsp &nbsp &nbsp  </h4></label>  

				<input type="text" name="aid" placeholder="A101" value="<?php if(isset($_POST['aid'])) echo $_POST['aid']; ?>">
				
			</div>	
			<br>
			<label><h4>Which information would you like to view ?</h4></label></br>
			<h5>
			<input type="checkbox" name="choice[]" value="address" >Address &nbsp &nbsp

			<input type="checkbox" name="choice[]" value="air_traffic_control">  Air_traffic_control &nbsp &nbsp  
			<input type="checkbox" name="choice[]" value="crew">  Crew  &nbsp &nbsp
			<input type="checkbox" name="choice[]" value="fuel_storage">  Fuel_storage &nbsp &nbsp 
			<input type="checkbox" name="choice[]" value="shops">  Shops  </br>
			</h5>
			<br>
			<button type="submit" name=submit class="btn btn-primary">Search</button>

		</form>
		<?php
			if(filter_has_var(INPUT_POST, 'submit')) //search button is submit here
			{
				$aid=htmlspecialchars($_POST['aid']);
				$query=mysqli_query($conn, "select * from airport where ID='$aid'");
				if(mysqli_num_rows($query)==0)
				{
					echo "</br>"."No data found";
				}
				else
				{
					if(!empty($_POST['choice']))
					{
						echo "<div class=container>";
						$row=mysqli_fetch_array($query);
						echo '</br>'.'<h4>'.'<b>'.$row['ID'] ."&nbsp&nbsp". $row['NAME'].'</b>'.'</h4>';
						foreach ($_POST['choice'] as $choice) 
						{
							if($choice=='address')
							{
							//	echo "<div>";

								echo '</br>'.'<h4>'.'Address info :'.'</h4>';
								$query=mysqli_query($conn,"select * from address where AIRPORT_ID='$aid'");
								echo "<table style=width:70% border=1 align=left bgcolor=#D7DBDD class=table-hover>";
								echo "<tr bgcolor=#909497>";
								echo "<th>CITY</th>";
								echo "<th>STATE</th>";
								echo "<th>PIN_CODE</th>";
								echo "</tr>";
								while ($row=mysqli_fetch_array($query)) 
								{
									$city=$row['CITY'];
									$state=$row['STATE'];
									$PIN_CODE=$row['PIN_CODE'];
									echo "<tr>";
									echo "<td>".$city."</td>"."<td>".$state."</td>"."<td>".$PIN_CODE."</td>";
									echo "</tr>";
								}
								echo "</table>";
								//echo "</div>";
								/*echo "<div align=left>";
								echo "..";
								echo "</div>";*/
							}
							else if($choice=='air_traffic_control')
							{
								echo " <div style=clear:both>";
								echo "</div>";
								//echo "<p>";
								echo '</br>'.'<h4>'.'Air_traffic info :'.'</h4>'.'</br>';
								$query=mysqli_query($conn,"select * from air_traffic_control where AIRPORT_ID='$aid'");
								echo "<table style=width:70% border=1 align=left bgcolor=#D7DBDD class=table-hover>";
								echo "<tr bgcolor=#909497>";
								echo "<th>TIME</th>";
								echo "<th>DOME</th>";
								echo "<th>TERMINUS</th>";
								echo "</tr>";
								while ($row=mysqli_fetch_array($query))
								{
									$time=$row['TIME'];
									$dome=$row['DOME'];
									$terminus=$row['TERMINUS'];
									echo "<tr>";
									echo "<td>".$time."</td>"."<td>".$dome."</td>"."<td>".$terminus."</td>";
									echo "</tr>";
								}
								echo "</table>";
								//echo "</p>";

							}
							else if($choice=='crew')
							{
								//echo "</br>";
								echo " <div style=clear:both>";
								echo "</div>";
								//echo "<p>";
								echo '</br>'.'<h4>'.'Crew info :'.'</h4>'.'</br>';
								
								$query=mysqli_query($conn,"select * from crew where AIRPORT_ID='$aid'");
								echo "<table style=width:70% border=1 align=left bgcolor=#D7DBDD class=table-hover display: inline-table>";
								echo "<tr bgcolor=#909497>";
								echo "<th>ID</th>";
								echo "<th>NAME</th>";
								echo "<th>SHIFT</th>";
								echo "<th>SALARY</th>";
								echo "<th>PRESENT_DAYS</th>";
								echo "<th>TYPE</th>";
								echo "</tr>";
								while ($row=mysqli_fetch_array($query))
								{
									$ID=$row['ID'];
									$NAME=$row['NAME'];
									$SHIFT=$row['SHIFT'];
									$SALARY=$row['SALARY'];
									$PRESENT_DAYS=$row['PRESENT_DAYS'];
									$TYPE=$row['TYPE'];
									echo "<tr>";
									echo "<td>".$ID."</td>"."<td>".$NAME."</td>"."<td>".$SHIFT."</td>"."<td>".$SALARY."</td>"."<td>".$PRESENT_DAYS."</td>"."<td>".$TYPE."</td>";
									echo "</tr>";
								}
								echo "</table>";
								
							//	echo "</p>";
								//echo "</div>";
							}
							else if($choice=='fuel_storage')
							{
								echo " <div style=clear:both>";
								echo "</div>";
							//	echo "<p>";
								echo '</br>'.'<h4>'.'Fuel_storage info :'.'</h4>'.'</br>';
								$query=mysqli_query($conn,"select * from fuel where AIRPORT_ID='$aid'");
								echo "<table style=width:50% border=1 align=left bgcolor=#D7DBDD class=table-hover>";
								echo "<tr bgcolor=#909497>";
								echo "<th>FUEL_NAME</th>";
								echo "<th>AVAILABLITY</th>";
								echo "<th>CAPACITY</th>";
								echo "</tr>";
								while ($row=mysqli_fetch_array($query))
								{
									$FUEL_NAME=$row['FUEL_NAME'];
									$AVAILABLITY=$row['AVAILABLITY'];
									$CAPACITY=$row['CAPACITY'];
									echo "<tr>";
									echo "<td>".$FUEL_NAME."</td>"."<td>".$AVAILABLITY."</td>"."<td>".$CAPACITY."</td>";
									echo "</tr>";
								}
								echo "</table>";
							//	echo "</p>";
								echo "</div>";
							}
							else if($choice=='shops')
							{
								echo " <div style=clear:both>";
								echo "</div>";
								
								//echo "<p>";
								echo '</br>'.'<h4>'.'Shops info :'.'</h4>'.'</br>';
								$query=mysqli_query($conn,"select * from shops where AIRPORT_ID='$aid'");
								echo "<table style=width:70% border=1 align=left bgcolor=#D7DBDD class=table-hover>";
								echo "<tr bgcolor=#909497>";
								echo "<th>NAME</th>";
								echo "<th>RENT</th>";
								echo "<th>SHOP_NUMBER</th>";
								echo "<th>TYPE</th>";
								echo "<th>REVENUE</th>";
								echo "</tr>";
								while ($row=mysqli_fetch_array($query))
								{
									$NAME=$row['NAME'];
									$RENT=$row['RENT'];
									$SHOP_NUMBER=$row['SHOP_NUMBER'];
									$TYPE=$row['TYPE'];
									$REVENUE=$row['REVENUE'];
									echo "<tr>";
									echo "<td>". $NAME ."</td>"."<td>". $RENT ."</td>"."<td>". $SHOP_NUMBER ."</td>"."<td>". $TYPE ."</td>"."<td>". $REVENUE."</td>";
									echo "</tr>";
								}
								echo "</table>";
								echo "</br>"."</br>"."</br>";
							//	echo "</p>";
								echo "</div>";

							}											
						}
						echo "</br>"."</br>"."</br>";
					}
					else
					{
						echo "</br>"."Please select atleast one option !!";
					}
					echo "</div>";
				}
			}
		?>

	</div>
</body>
</html>