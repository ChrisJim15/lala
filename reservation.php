
<?php
	session_start();



 	include_once("config.php");

 	if(isset($_POST['Add'])){
 		$reservedate=mysqli_real_escape_string($db,$_POST['reservedate']);
 		$restime=mysqli_real_escape_string($db,$_POST['restime']);
 		$returndate=mysqli_real_escape_string($db,$_POST['returndate']);
 		$studid=mysqli_real_escape_string($db,$_POST['studid']);
 		$equipid=mysqli_real_escape_string($db,$_POST['equipid']);
 		$issuedby=mysqli_real_escape_string($db,$_POST['issuedby']);


 		$result=mysqli_query($db,"INSERT INTO `reservation`(reservedate,restime,returndate,studid,equipid,issuedby) VALUES('$reservedate','$restime','$returndate','$studid','$equipid','$issuedby')");


 		echo "<script>alert('Succesfully Reserved!');window.location.href='viewreservation.php';</script>";

 	}
?>
<html>
<head>
<title>Equipment</title>
<body>	
</body>

<center>
	<br>
	<br>
	<br>
	<br>
	<br>
<form action="reservation.php" method="post">
	<table width ="20%" border="0">
	<tr>
	<td>Reservation Date: </td>
	<td><input type="Date" name="reservedate"></td>
	</tr>

	<tr>
	<td>Reservation Time: </td>
	<td><input type="time" name="restime"></td>
	</tr>

	<tr>
	<td>Return Date: </td>
	<td><input type="Date" name="returndate"></td>
	</tr>
	<tr>

	<tr>
	<td>Student ID: </td>
	<td><input type="number" name="studid"></td>
	</tr>
	<tr>

	<tr>
	<td>Equipment ID: </td>
	<td><input type="number" name="equipid"></td>
	</tr>
	<tr>

	<tr>
	<td>Issued by: </td>
	<td><input type="text" name="issuedby"></td>
	</tr>
	<tr>

	<td></td>
	<br>
	<td><input type="submit" name="Add" value="Submit"></td>

	</tr>
</html>