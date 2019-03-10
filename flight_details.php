<?php
	include 'connection.php';
	$msg='';
	$msgClass='';
	if(filter_has_var(INPUT_POST, 'submit')) //search button is submit here
	{
		$sname=htmlspecialchars($_POST['sname']);
		$dname=htmlspecialchars($_POST['dname']);
		$fdate=htmlspecialchars($_POST['fdate']);
		if(!empty($sname) && !empty($dname))
		{
			
		}
		else 
		{
			//Show error
			$msg='Please enter a valid Source and Destination';
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
			
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<br>
			<br>
			<h4>
			<div class="form-group">
				<label>Enter the Source</label><br>
				<input type="text" name="sname" class="form-control" placeholder="NAME" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">

			</div>
			<div>
				<label>Enter the Destination </label><br>
				<input type="text" name="dname" class="form-control" placeholder="NAME" value="<?php if(isset($_POST['dname'])) echo $_POST['dname']; ?>">
			</div>
			<div>
				<label>Enter the Date </label><br>
				<input type="Date" name="fdate" class="form-control" placeholder="NAME" value="<?php if(isset($_POST['fdate'])) echo $_POST['fdate']; ?>">
			</div>
		</h4>
			<br>
			<button type="submit" name=submit class="btn btn-primary">Search</button><br>
		</form>
		<div class="container">
		<?php
	$msg='';
	$msgClass='';
	if(filter_has_var(INPUT_POST, 'submit')) //search button is submit here
	{
		$sname=htmlspecialchars($_POST['sname']);
		$dname=htmlspecialchars($_POST['dname']);
		$fdate=htmlspecialchars($_POST['fdate']);
		if(!empty($sname) && !empty($dname))
		{
			echo '</br>'.'<h4>'.'Flights available are :'.'</h4>'.'</br>';
			if(!empty($fdate))
			{
				$query=mysqli_query($conn,"select f.FLIGHT_NUMBER,f.TYPE,f.AIRPORT_ID,r.SOURCE,r.DESTINATION,r.stops,r.S_TIME,r.D_TIME from flight f , route r where r.SOURCE='$sname' and r.DESTINATION='$dname' and f.FLIGHT_NUMBER=r.FLIGHT_NUMBER and date(r.S_TIME)='$fdate'");
				if(mysqli_num_rows($query)==0)
				{
					echo "No data found";
				}
				else{

					echo "<table style=width:80% border=2 align=left bgcolor=#D7DBDD class=table-hover>";
					echo "<tr bgcolor=#909497>";
					echo "<th>FLIGHT_NUMBER</th>";
					echo "<th>TYPE</th>";
					echo "<th>STOPS</th>";
					echo "<th>S_TIME</th>";
					echo "<th>D_TIME</th>";
					echo "</tr>";
					while($row=mysqli_fetch_array($query))
					{
					$FLIGHT_NUMBER=$row['FLIGHT_NUMBER'];
					$TYPE=$row['TYPE'];
					$AIRPORT_ID=$row['AIRPORT_ID'];
					$SOURCE=['SOURCE'];
					$DESTINATION=['DESTINATION'];
					$stops=$row['stops'];
					$S_TIME=$row[('S_TIME')];
					$D_TIME=$row['D_TIME'];
					echo "<tr>";
					echo "<td>".$FLIGHT_NUMBER."</td>". "<td>".$TYPE."</td>"."<td>".$stops."</td>"."<td>".$S_TIME."</td>"."<td>".$D_TIME."</td>" ;
					echo "</tr>";
				}
				echo "</table>";
			}
			}
			else
			{
				$query=mysqli_query($conn,"select f.FLIGHT_NUMBER,f.TYPE,f.AIRPORT_ID,r.SOURCE,r.DESTINATION,r.stops,r.S_TIME,r.D_TIME from flight f , route r where r.SOURCE='$sname' and r.DESTINATION='$dname' and f.FLIGHT_NUMBER=r.FLIGHT_NUMBER");
				if(mysqli_num_rows($query)==0)
				{
					echo "No data found";
				}
				else{
					echo "<table style=width:80% border=2 align=left bgcolor=#D7DBDD class=table-hover>";
					echo "<tr bgcolor=#909497>";
					echo "<th>FLIGHT_NUMBER</th>";
					echo "<th>TYPE</th>";
					//echo "<th>AIRPORT_ID</th>";
					//echo "<th>SOURCE</th>";
					//echo "<th>DESTINATION</th>";
					echo "<th>STOPS</th>";
					echo "<th>S_TIME</th>";
					echo "<th>D_TIME</th>";
					echo "</tr>";
				while($row=mysqli_fetch_array($query))
				{
					$FLIGHT_NUMBER=$row['FLIGHT_NUMBER'];
					$TYPE=$row['TYPE'];
					$AIRPORT_ID=$row['AIRPORT_ID'];
					$SOURCE=$row['SOURCE'];
					$DESTINATION=$row['DESTINATION'];
					$stops=$row['stops'];
					$S_TIME=$row['S_TIME'];
					$D_TIME=$row['D_TIME'];
					echo "<tr>";
					echo "<td>".$FLIGHT_NUMBER."</td>". "<td>".$TYPE."</td>"."<td>".$stops."</td>"."<td>".$S_TIME."</td>"."<td>".$D_TIME."</td>" ;
					echo "</tr>";
				}
				echo "</table>";
			
			}
			}
	
		}
	}
			?>
			</div>
	</div>
</body>
</html>