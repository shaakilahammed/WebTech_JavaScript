<?php
	session_start();
	
	
	if(isset($_SESSION["uname"]))
	{
		$uname=$_SESSION["uname"];
		header("location:dashboard.php");
	}
	$error="";

?>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "xdb";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
		  if(isset($_POST["uname"]) && isset($_POST["pass"])) 
		  {
			$sql = "SELECT * FROM users WHERE username = '".$_POST["uname"]."' and password = '".$_POST["pass"]."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0)
			{
				$_SESSION["uname"]=$_POST["uname"];
				header("location: dashboard.php");
			}
				
			else
				echo "wrong email or password";
		  }
		  
		 
   }
	?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
	<style>
		body{
			margin:0;
			padding:0px 50px;
		}
		a{
			text-decoration:none;
		}
		.header_area{
			width:100%;
			
			
		}
		.logoarea{
			width:40%;
			float:left;
			background-color:#25cee0;
		}
		.logoarea h1{
			padding-left:30px;
		}
		.menu_area{
			width:60%;
			float:left;
			background-color:#25cee0;
		}
		.menu_area ul{
			list-style:none;
			text-align:right;
		}
		.menu_area ul li{
			display:inline-block;
			padding:15px;
			color:white;
		}
		.menu_area ul li a{
			
			color:white;
		}
		.content_area{
			height:500px;
			width:100%;
			overflow:hidden;
		}
		
		.footer_area{
			width:100%;
			overflow:hidden;
		}
		.footer_area h3{
			text-align:center;
		}
		.content_left{
			background-color:#b770d7;
			color:white;
		}
		.content_left ul{
			list-style:none;
		}
		.content_left ul li{
			padding:10px 0px;
			
		}
		.content_left ul li a{
			color:white;
			padding:10px 0px;
		}
		.content_left ul li a:hover{
			background-color:black;
		}
		.footer_area{
			background-color:#25cee0;
		}
	</style>
</head>
<body>
	<div class="header_area">
		<div class="logoarea">
			<h1><span class="x">X</span>Company</h1>
		</div>
		<div class="menu_area">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="registration.php">Registration</a></li>
			</ul>
		</div>
	</div>
	<div class="content_area">
		<h1>LOGIN</h1>
		<form method="post" onsubmit="validateForm()">
			<table>
				
				<tr>
					<td><b>Username :</b></td>
					<td><input type="text" name="uname"/></td>
					
				</tr>
				
				<tr>
					<td><b>Password :</b></td>
					<td><input type="password" name="pass"/></td>
					
				</tr>
				<tr>
					<td><b><a href="forgetpassword.php">Forget Password?</a></b></td>
					
					
				</tr>

				<tr>
					<td align="center" colspan="2"><input type="submit" value="Submit" /></td>
					
				</tr>
				
			</table>

		
		</form>
	
	</div>
	<div class="footer_area">
		<h3>&copy; all right reserved Shakil Ahammed</h3>
	</div>
	<script>
	function validateForm() {
		var passError,usernameError;
		
		var x4 = document.forms["loginForm"]["uname"].value;
		var x5 = document.forms["loginForm"]["pass"].value;
		
		if (x4 == "") {
			usernameError="*username is required";
		}
		else{
			usernameError="";
		}
		if (x5 == "") {
			passError="*Password is required";
		}
		else{
			passError="";
		}
		
		document.getElementById("error4").innerHTML = usernameError;
		document.getElementById("error5").innerHTML = passError;
	} 
</script>
</body>
</html>