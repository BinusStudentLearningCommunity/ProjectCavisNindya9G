<?php 
	include('../database/connect.php');

	$nim = null;
	$nim = $_REQUEST['nim'];
	$nama = null;
	$nama = $_REQUEST['nama'];

	$result = mysql_query("INSERT INTO cavis (nim, nama) VALUES ( '". $nim ."', '". $nama ."' )");
	if( $result )
	{
		header('Location: index.php');
	}
	else 
	{
		echo "Error";
	}
 ?>