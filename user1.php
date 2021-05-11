
<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<center><h1 style="font-family: Century Gothic, Arial; color: blue;"><a href="viewprofile.php">View Profile</h1></center></a></br></br>
	<center><h1 style="font-family: Century Gothic, Arial; color: blue;"><a href="reservation.php">Ticket Reservation</h1></center></a></br></br>
	<center><h1 style="font-family: Century Gothic, Arial; color: blue;"><a href="viewreservation.php">View Reservation</h1></center></a></br></br>

     <ul class="nav navbar-nav navbar-right">
       <li><a>Welcome <?php echo $_SESSION['fname'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>

</body>
</html>