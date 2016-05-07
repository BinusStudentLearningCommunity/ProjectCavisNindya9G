<?php
//get real password from database
include '../database/connect.php';
$query = "SELECT password FROM admin";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_assoc($result);

//checking the password
if(md5($_POST['password1'])==$data['password'])
{
	//Login success
	session_start();
	$_SESSION['admin'] = 1;
	header("location:../cavis/index.php");
}
else
{
	//fail to login, redirect to current page
	header("location:index.php?msg=Password Salah");
}
?>