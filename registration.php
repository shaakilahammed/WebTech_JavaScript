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
		<h3> REGISTRATION</h3>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="regForm" onsubmit="validateForm()">
			<table>
				<tr>
					<td><b>Name :</b></td>
					<td><input type="text" name="name"/></td>
					<td id="error1"></td>
				
				</tr>
				<tr>
					<td><b>Email :</b></td>
					<td><input type="email" name="email"/></td>
					<td id="error2"></td>
				</tr>
				<tr>
					<td><b>Gender :</b></td>
					<td>
						<input type="radio" name="gender" value="female">Female
  						<input type="radio" name="gender" value="male">Male
  						<input type="radio" name="gender" value="other">Other
					</td>
					<td id="error3"></td>
				</tr>

				
				<tr>
					<td><b>UserNmae :</b></td>
					<td><input type="text" name="username"/></td>
					<td id="error4"></td>
				</tr>
				<tr>
					<td><b>Password :</b></td>
					<td><input type="password" name="pass"/></td>
					<td id="error5"></td>
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
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["gender"]) && isset($_POST["username"])&& isset($_POST["pass"]))
		{
			$sql = "INSERT INTO users (name, email,username,password)
			VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["username"]."','".$_POST["pass"]."')";

			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		
	}
	

	$conn->close();
?>
<script>
	function validateForm() {
	var nameError,emailError,genderError,passError,usernameError;
	var x1 = document.forms["regForm"]["name"].value;
	var x2 = document.forms["regForm"]["email"].value;
	var x3 = document.forms["regForm"]["gender"].value;
	var x4 = document.forms["regForm"]["username"].value;
	var x5 = document.forms["regForm"]["pass"].value;
	if (x1 == "") {
		nameError="*Name is required";
		
	}
	else{
		nameError="";
	}
	if (x2 == "") {
		emailError="*Email is required";
	}
	else{
		emailError="";
	}
	if (x3 == "") {
		genderError="*Gender is required";
	}
	else{
		genderError="";
	}
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
	document.getElementById("error1").innerHTML = nameError;
	document.getElementById("error2").innerHTML = emailError;
	document.getElementById("error3").innerHTML = genderError;
	document.getElementById("error4").innerHTML = usernameError;
	document.getElementById("error5").innerHTML = passError;
} 
</script>
</body>
</html>