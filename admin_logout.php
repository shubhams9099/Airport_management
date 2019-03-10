<?php
session_start();
if(isset($_SESSION['uname']))
{
	session_destroy();
	echo "<script>location.href='project.php'</script>";
}
else
{
	echo "hello";
	echo "<script>location.href='project.php'</script>";
}
?>