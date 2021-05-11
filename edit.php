<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

 		
	    $reservedate = mysqli_real_escape_string($db,$_POST['reservedate']);
 		$restime = mysqli_real_escape_string($db,$_POST['restime']);
 		$returndate = mysqli_real_escape_string($db,$_POST['returndate']);
 		$studid = mysqli_real_escape_string($db,$_POST['studid']);
 		$equipid = mysqli_real_escape_string($db,$_POST['equipid']);
 		$issuedby = mysqli_real_escape_string($db,$_POST['issuedby']);
 		$reserve_id = mysqli_real_escape_string($db,$_POST['reserve_id']);
 			
	
	// checking empty fields
 		$result=mysqli_query($db,"UPDATE `reservation`SET reservedate='$reservedate', restime='$restime', returndate='$returndate',studid='$studid', equipid='$equipid',issuedby='$issuedby' WHERE reserve_id = $reserve_id ");
		//redirectig to the display page. In our case, it is index.php
		header("Location: viewreservation.php");
	}

?>
<?php
//getting id from url
$reserve_id= $_GET['reserve_id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM `reservation` WHERE reserve_id = $reserve_id ");

while($res = mysqli_fetch_array($result))
{

		$reservedate= $res['reservedate'];
		$restime= $res['restime'];
		$returndate= $res['returndate'];
		$studid= $res['studid'];
		$equipid= $res['equipid'];
		$issuedby= $res['issuedby'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="POST" action="edit.php">
		<table border="0">
	<tr>
	<td>Reservation Date: </td>
	<td><input type="Date" name="reservedate" value="<?php echo $reservedate; ?>"></td>
	</tr>

	<tr>
	<td>Reservation Time: </td>
	<td><input type="time" name="restime" value=<?php echo $restime; ?>></td>
	</tr>

	<tr>
	<td>Return Date: </td>
	<td><input type="Date" name="returndate" value=<?php echo $returndate; ?>></td>
	</tr>
	

	<tr>
	<td>Student ID: </td>
	<td><input type="number" name="studid" value=<?php echo $studid; ?>></td>
	</tr>
	

	<tr>
	<td>Equipment ID: </td>
	<td><input type="number" name="equipid" value=<?php echo $equipid; ?>></td>
	</tr>
	<tr>

	<tr>
	<td>Issued by: </td>
	<td><input type="text" name="issuedby" value=<?php echo $issuedby; ?> ></td>
	</tr>
			<tr>
				<td><input type="hidden" name="reserve_id" value=<?php echo $_GET['reserve_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
