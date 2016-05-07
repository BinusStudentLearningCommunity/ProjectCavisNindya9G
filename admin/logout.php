<?php 
//destroying the ADMIN session
session_start();
session_unset();
session_destroy();

//redirect to first page
header('location:../absen/index.php');
 ?>