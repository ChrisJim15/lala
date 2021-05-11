
<?php
		session_start();

		include_once("config.php");

		if(isset($_POST['update'])){

		

		$reservedate=mysqli_real_escape_string($db,$_POST['reservedate']);
 		$restime=mysqli_real_escape_string($db,$_POST['restime']);
 		$returndate=mysqli_real_escape_string($db,$_POST['returndate']);
 		$studid=mysqli_real_escape_string($db,$_POST['studid']);
 		$equipid=mysqli_real_escape_string($db,$_POST['equipid']);
 		$issuedby=mysqli_real_escape_string($db,$_POST['issuedby']);

 		$reserveid=mysqli_real_escape_string($db,$_POST['reserveid']);

 		$result=mysqli_query($db,"UPDATE `reservation` SET reservedate='$reservedate',restime='$restime',returndate='$returndate',studid='$studid',equipid='$equipid',issuedby='$issuedby' WHERE reserveid=$reserveid");

 		header("Location: viewreservation.php");

		}

?>
<?php
	$reserveid=$_GET['reserveid'];

	$result=mysqli_query($db,"SELECT * FROM reservation WHERE reserveid=$reserveid");

	while ($res=mysqli_fetch_array($result)) {
		
		$reservedate= $res['reservedate'];
		$restime= $res['restime'];
		$returndate= $res['returndate'];
		$studid= $res['studid'];
		$equipid= $res['equipid'];
		$issuedby= $res['issuedby'];

	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<form action="edit.php" method="POST">
		<table width="50%" border="0">
			<tr>
	<td>Reservation Date: </td>
	<td><input type="Date" name="reservedate" value="<?php echo $reservedate; ?>"></td>
	</tr>

	<tr>
	<td>Reservation Time: </td>
	<td><input type="time" name="restime" value="<?php echo $restime; ?>" ></td>
	</tr>

	<tr>
	<td>Return Date: </td>
	<td><input type="Date" name="returndate" value="<?php echo $returndate; ?>"></td>
	</tr>
	<tr>

	<tr>
	<td>Student ID: </td>
	<td><input type="number" name="studid" value="<?php echo $studid; ?>"></td>
	</tr>
	<tr>

	<tr>
	<td>Equipment ID: </td>
	<td><input type="number" name="equipid" value="<?php echo $equipid; ?>"></td>
	</tr>
	<tr>

	<tr>
	<td>Issued by: </td>
	<td><input type="text" name="issuedby" value="<?php echo $issuedby; ?>"></td>
	</tr>
	<tr>

	<td></td>
	<br>
	<td><input type="hidden" name="reserveid" value=<?php echo $_GET['reserveid']; ?>></td>
	<td><input type="submit" name="update" value="Update"></td>

	</tr>
			
		</table>
	</form>
</body>

