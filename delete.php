<?php

	include_once("config.php");

	$reserve_id=$_GET['reserve_id'];

	$result=mysqli_query($db,"DELETE FROM `reservation` WHERE reserve_id=$reserve_id");

	header("Location: viewreservation.php");

?>