<?php
	$admin_uname="admin";
	$admin_pass="admin";
	$cust_uname="cust";
	$cust_pass="cust";
	$acc_uname="acc";
	$acc_pass="acc";
	$fuel_uname="fdep";
	$fuel_pass="fdep";
	session_start();
	if(isset($_SESSION['uname']))
	{
		echo "<div class='container' align='center' >";
		echo "Continue Where u left ";
		echo "<br>";
		echo "<a href ='choice.php'><button style='width:auto;''>Continue</button></a>";
		echo "</div>";
	}
	else
	{
		if($_POST['uname']==$admin_uname  && $_POST['pass']==$admin_pass)
		{
			$_SESSION['uname']=$admin_uname;
			$_SESSION['admin']=$admin_uname;
			echo "<script>location.href='choice.php'</script>";
		}
		else if($_POST['uname']==$cust_uname  && $_POST['pass']==$cust_pass)
		{
			$_SESSION['uname']=$cust_uname;
			$_SESSION['cust']=$cust_uname;
			echo "<script>location.href='choice.php'</script>";
		}
		else if($_POST['uname']==$acc_uname  && $_POST['pass']==$acc_pass)
		{
			$_SESSION['uname']=$acc_uname;
			$_SESSION['acount']=$acc_uname;
			echo "<script>location.href='choice.php'</script>";
		}
		else if($_POST['uname']==$fuel_uname  && $_POST['pass']==$fuel_pass)
		{
			$_SESSION['uname']=$fuel_uname;
			$_SESSION['fuel']=$fuel_uname;
			echo "<script>location.href='choice.php'</script>";
		}
		else
		{
			echo "<script>alert('Incorrect credentials')</script>";
			echo "<script>location.href='project.php'</script>";
		}
	}
?>