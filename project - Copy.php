<!DOCTYPE html>
<html>
<head>
	<title>Project</title>
	<link rel="Stylesheet" href=effect2.css>

	<style>
input[type=text], input[type=password] { 
    width: 100%; 
    padding: 12px 20px; 
    margin: 8px 0; 
    display: inline-block; 
    border: 1px solid #ccc; 
    box-sizing: border-box; 
} 
button { 
    background-color: #2E4053; 
    color: white; 
    padding: 14px 20px; 
    margin: 8px 0; 
    border: none; 
    cursor: pointer; 
    width: 100%; 
} 
  
button:hover { 
    
    background-color: #212F3C;
} 
  
  
.cancelbtn { 
    width: auto; 
    padding: 10px 18px; 
    background-color: #f44336; 
} 
  
  
.imgcontainer { 
    text-align: center; 
    margin: 24px 0 12px 0; 
    position: relative; 
} 
.container { 
    padding: 16px; 
} 
  
span.psw { 
    float: right; 
    padding-top: 16px; 
} 
  
  
.modal { 
    display: none;  
    position: fixed; 
    z-index: 1;  
    left: 0; 
    top: 0; 
    width: 100%; 
    height: 100%; 
    overflow: auto;  
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
    padding-top: 60px; 
} 
  
  
.modal-content { 
    background-color: #fefefe; 
    margin: 5% auto 15% auto;  
    border: 1px solid #888; 
    width: 80%;  
} 
  
.close { 
    position: absolute; 
    right: 25px; 
    top: 0; 
    color: #000; 
    font-size: 35px; 
    font-weight: bold; 
} 
  
.close:hover, 
.close:focus { 
    color: red; 
    cursor: pointer; 
} 
  
.animate { 
    -webkit-animation: animatezoom 0.6s; 
    animation: animatezoom 0.6s 
} 
  
@-webkit-keyframes animatezoom { 
    from {-webkit-transform: scale(0)}  
    to {-webkit-transform: scale(1)} 
} 
    @keyframes animatezoom { 
    from {transform: scale(0)}  
    to {transform: scale(1)} 
} 
@media screen and (max-width: 300px) { 
    span.psw { 
       display: block; 
       float: none; 
    } 
    .cancelbtn { 
       width: 100%; 
    } 
}

</style>
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
			<ul class="navbar-nav ml-auto">
				<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><h4>Login</h4></button>
				<li class="nav-item">
				</li>
			
			</ul>
		</div>
	</nav> 
 <div id="id01" class="modal"> 
  <form class="modal-content animate" action="admin_login.php" method="post">  
    <div class="container"> 
      <label><b>Username</b></label> 
      <input type="text" placeholder="Enter Username" name="uname" required> 
  
      <label><b>Password</b></label> 
      <input type="password" placeholder="Enter Password" name="pass" required> 
          
      <button type="submit">Login</button> 
    </div> 
  
  <!--  <div class="container" style="background-color:#f1f1f1"> 
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> 
    </div>--> 
  </form> 
</div> 
<script> 
  
var modal = document.getElementById('id01'); 
window.onclick = function(event) { 
    if (event.target == modal) { 
        modal.style.display = "none"; 
    } 
} 
</script> 
<br>
<?php
	echo '<h3>'.'&nbsp'.'&nbsp'."Our Project includes following airports".'</h3>'.'</br>';
	
	include 'images.php';
?>
</body>
</html>