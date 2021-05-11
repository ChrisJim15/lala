<?php
	session_start();

	if (!isset($_SESSION['reserveid'])) 
	
	?>

<html>
<head>	
	<title>View Reservation</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($db, "SELECT * FROM `reservation` ORDER BY reserve_id ASC"); // using mysqli_query instead
?>

 <form action="viewreservation.php" method="post">
 
	<table width="80%" border="0">
	<tr bgcolor="#CCCCCC">
		<td>Reservation Date</td>
		<td>Reservation Time</td>
		<td>Return Date</td>
		<td>Student ID</td>
		<td>Equipment ID</td>
		<td>Issued by:</td>
		<td>Update</td>

	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['reservedate']."</td>";
		echo "<td>".$res['restime']."</td>";
		echo "<td>".$res['returndate']."</td>";	
		echo "<td>".$res['studid']."</td>";	
		echo "<td>".$res['equipid']."</td>";	
		echo "<td>".$res['issuedby']."</td>";	
		echo "<td><a href=\"edit.php?reserve_id=$res[reserve_id]\">Edit</a> | <a href=\"delete.php?reserve_id=$res[reserve_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>

	</table>
	</form>
</body>
</html>
