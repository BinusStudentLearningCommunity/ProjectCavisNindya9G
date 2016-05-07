<?php 

	include('../database/connect.php');
	$nim = null;
	$nim = $_REQUEST['nim'];

	$result = mysql_query("DELETE FROM cavis WHERE nim='$nim'");
	
	if( $result)
	{
		header('Location: index.php');
	}
	else 
	{
		echo "Error";
	}
 ?>