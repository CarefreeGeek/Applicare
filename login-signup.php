<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "roshan25";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle signup
if (isset($_POST['signup'])) {
	$email = $_POST['email'];
    $username = $_POST['username'];
    $pswd = $_POST['pswd'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $checkEmailQuery = "SELECT * FROM logindata WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists. Please use a different email.";
    } else {
        $bhejo = "INSERT INTO logindata (email, username, pswd, fullname, phone, address) values ('$email','$username','$pswd','$fullname',' $phone','$address')";
        if (mysqli_query($conn, $bhejo)) {
            echo "Data inserted successfully";
            header("Location: userdashboard.html");
            exit();
        } else {
            echo "Error in inserting data: " . $conn->error;
        }
    }
}
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="login-signup.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<style>
		body{
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			font-family: 'Jost', sans-serif;
			background: linear-gradient(to bottom, #0f0c29, #1a106a, #24243e);
		}
		.main{
			width: 50%;
			height: 80%;
			background: red;
			overflow: hidden;
			background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
			border-radius: 10px;
			box-shadow: 5px 20px 50px #000;
		}
		#chk{
			display: none;
		}
		.signup{
			position: relative;
			width:100%;
			height: 100%;
			transition: .8s ease-in-out;
		}
		label{
			color: #fff;
			font-size: 2.3em;
			justify-content: center;
			display: flex;
			margin: 60px;
			font-weight: bold;
			cursor: pointer;
			transition: .5s ease-in-out;
		}
		input{
			width: 60%;
			height: 20px;
			background: #e0dede;
			justify-content: center;
			display: flex;
			margin: 20px auto;
			padding: 10px;
			border: none;
			outline: none;
			border-radius: 5px;
		}
		button{
			width: 60%;
			height: 40px;
			margin: 10px auto;
			justify-content: center;
			display: block;
			color: #fff;
			background: #573b8a;
			font-size: 1em;
			font-weight: bold;
			margin-top: 20px;
			outline: none;
			border: none;
			border-radius: 5px;
			transition: .2s ease-in;
			cursor: pointer;
		}
		button:hover{
			background: #6d44b8;
		}
		.login{
			height: 50px;
			background: #eee;
			border-radius: 10%;
			transform: translateY(-50px);
			transition: .8s ease-in-out;
		}
		.login label{
			color: #573b8a;
			transform: scale(.6);
		}

		#chk:checked ~ .login{
			transform: translateY(-500px);
		}
		#chk:checked ~ .login label{
			transform: scale(1);	
		}
		#chk:checked ~ .signup label{
			transform: scale(.6);
		}
		#chk:checked ~ .signup form{
			transform: translateY(-800px);
		}

	</style>

	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<label for="chk" aria-hidden="true">Sign up</label>
				<form id="signup" type="signup" method="POST">
					<input type="username" name="username" placeholder="username" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<input type="fullname" name="fullname" placeholder="fullname" required="">
					<input type="phone" name="phone" placeholder="phone number" required="">
					<input type="address" name="address" placeholder="address">
					<button type="submit" name="signup">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form id="login" type="login" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button type="submit" name="login">Login</button>
				</form>
				<a href="#" style="margin-left: 10px;">forget password</a>
			</div>
			
	</div>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const signupForm = document.querySelector('.signup form');
			const loginForm = document.querySelector('.login form');
	
			// Signup form validation
			signupForm.addEventListener('submit', function(event) {
				const fullname = signupForm.fullname.value.trim();
				const email = signupForm.email.value.trim();
				const password = signupForm.pswd.value.trim();
	
				if (fullname === "") {
					alert("Full name is required.");
					event.preventDefault(); // Prevent form submission
					return;
				}
	
				if (email === "") {
					alert("Email is required.");
					event.preventDefault();
					return;
				}
	
				if (!validateEmail(email)) {
					alert("Please enter a valid email address.");
					event.preventDefault();
					return;
				}
	
				if (password === "") {
					alert("Password is required.");
					event.preventDefault();
					return;
				}
	
				if (password.length < 6) {
					alert("Password must be at least 6 characters long.");
					event.preventDefault();
					return;
				}
			});
	
			// Login form validation
			loginForm.addEventListener('submit', function(event) {
				const email = loginForm.email.value.trim();
				const password = loginForm.pswd.value.trim();
	
				if (email === "") {
					alert("Email is required.");
					event.preventDefault();
					return;
				}
	
				if (!validateEmail(email)) {
					alert("Please enter a valid email address.");
					event.preventDefault();
					return;
				}
	
				if (password === "") {
					alert("Password is required.");
					event.preventDefault();
					return;
				}
			});
	
			// Email validation function
			function validateEmail(email) {
				const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				return re.test(String(email).toLowerCase());
			}
		});
	</script>
</body>
</html>