<?php
include 'config.php';
if (isset($_POST['search']))
{
	$id = $_POST['search'];
	$result = mysqli_query($db,"SELECT * FROM `user` WHERE fname like '%$id%'");
	if(mysqli_num_rows($result)==0)
	{
		echo '<center><h4 style="font-family:Century Gothic, Arial; color:red">Record not found</h4></center>';
	    echo '<center><h4 style="font-family:Century Gothic, Arial;"><a href="viewprofile.php">Refresh</a></h4></center>';
	}
}
else
{
	$result = mysqli_query($db,"SELECT * FROM `user` order by id desc");
}






?>
<!DOCTYPE html>
<html>
<head>
	<title>VIEW BUS SCHEDULE</title>
</head>
<body>
	<form action="viewprofile.php" method="post">
		<center><input type="text" name="search" placeholder="Search...."/>
		<input type="submit" name="submit" value="Search"></center>
		</form>
		<center>
		<table border="2">
			<tr>
				
				<th>ID</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
		
			<?php
			while($res = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>".$res['id']."</td>";
				echo "<td>".$res['fname']."</td>";
				echo "<td>".$res['lname']."</td>";
				echo "<td>".$res['gender']."</td>";
				echo "<td>".$res['age']."</td>";
				echo "<td>".$res['email']."</td>";
				echo "<td>".$res['username']."</td>";
				echo "<td>".$res['password']."</td>";
				echo "<td><a = href=\"editprofile.php?id=$res[id]\">EDIT</a></td>";
				echo "</tr>";
			}




	

			?>

	</table>
	</center>

</body>
</html>