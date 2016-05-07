<?php 
if ( ($_POST['NIM']=="") ) //NIM is not filled
	header('Location:index.php?msg=NIM is required');
else
{
	include ('../database/connect.php');

//cari isi picket list
	//FIND nim & idLogin from picketlist
	$query = "SELECT c.nim, lin.idLogin FROM 
	cavis c join login lin 
	on c.nim=lin.nim 
	left outer join logout lout 
	on lin.idLogin=lout.idLogin
	where lin.idLogin not in
	(
	    SELECT idLogin from logout
	) AND DATE(jamLogin) = CURDATE()";
	$result = mysql_query($query) or die(mysql_error());
	$i=0; //for array indexes
	while($row = mysql_fetch_assoc($result))
	{
		$picketingNIM[$i] = $row['nim'];
		$picketingIDLogin[$i] =$row['idLogin'];
		$i = $i+1;
	}

	//Find NIM from Database
	$NIM = $_POST['NIM'];
	$query = "SELECT * from cavis where nim ='$NIM'";
	$result = mysql_query($query);
	if($row = mysql_fetch_assoc($result)) { //if nim is found
		
		$nim = $row['nim']; //grab the nim
		if(in_array($nim, $picketingNIM)) //if nim is in picketlist
		{
			//then LOGOUT
			$idx = array_search($nim, $picketingNIM);
			$idLogin = $picketingIDLogin[$idx];
			$query = "INSERT INTO Logout (idLogin,jamLogout) VALUES ( '$idLogin', NOW() )";
			mysql_query($query);
			header("Location:index.php?msg=<br>Log OUT : ".$row['nama']."<br>".date("Y-m-d h:i:sa"));
		}
		else //LOGIN
		{
			$query = "INSERT INTO Login (nim,jamLogin) VALUES ( '$nim', NOW() )";
			mysql_query($query);
			header("Location:index.php?msg=<br>Log IN : ".$row['nama']."<br>".date("Y-m-d h:i:sa"));
		}
	}
	else { //nim not found
		header('Location:index.php?msg=NIM not Found');	
	}
	
}
	
?>