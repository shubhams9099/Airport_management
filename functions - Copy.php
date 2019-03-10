<!DOCTYPE html>
<html>
<head>
	<title> functions :</title>
</head>
<body>
	<form id="form1" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	
<p>Click the button to demonstrate the prompt box.</p>
<input type="text" name="name">Name:
<input type="text" name="age">Age:
<input type="text" name="fid">Flight_Number
<input type="text" name="type">Type 	 	 	
<button onclick="myFunction()">Submit</button>

<p id="demo"></p>
	
</form>

<script>
function myFunction() 
{
    var x = document.getElementById("form1");
    var name=x.elements["name"].value;
    var age=x.elements["age"].value;
    var fid=x.elements["fid"].value;
    var type=x.elements["type"].value;
    document.
}
</script>
</body>
</html>