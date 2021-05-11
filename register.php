<?php
include_once('config.php');

if(isset($_POST['submit']))
{
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	$fname=mysqli_real_escape_string($db,$_POST['fname']);
	$lname=mysqli_real_escape_string($db,$_POST['lname']);
	$gender=mysqli_real_escape_string($db,$_POST['gender']);
	$age=mysqli_real_escape_string($db,$_POST['age']);
	$email=mysqli_real_escape_string($db,$_POST['email']);
	$user_type="user";

	$result=mysqli_query($db,"INSERT INTO user(username,password,fname,lname,gender,age,email,user_type) VALUES('$username','$password','$fname','$lname','$gender','$age','$email','$user_type')");

	echo "<script>alert('Registered Successfully');window.location.href='login.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
<form action="register.php" method="post">
		<h2>REGISTRATION FORM</h2>
	 <h1>Sign Up</h1>
	<input type="text" name="username" placeholder="Username" required="required" />
	 <input type="password" name="password" placeholder="Password " required="required" />
    <input type="text" name="fname" placeholder="First Name" required="required" />
    <input type="text" name="lname" placeholder="Last Name" required="required" />
     <input type="text" name="gender" placeholder="Gender" required="required" />
      <input type="text" name="age" placeholder="Age" required="required" />
       <input type="text" name="email" placeholder="email" required="required" />
    <input type="submit" name="submit" value="Sign Up" />


		<button><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></button>
	
  	
</form>
</body>
</html>
