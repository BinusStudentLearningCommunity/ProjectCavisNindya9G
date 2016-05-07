<?php 
session_start();
if (isset($_SESSION['admin'])) 
{ 
	include('../database/connect.php');
	$sqlstr = "SELECT 
		a.nim, 
		nama, 
		sum(timestampdiff(MINUTE,jamlogin,jamlogout)) AS 'Total Menit',
		floor(sum(timestampdiff(MINUTE,jamlogin,jamlogout)/100)) AS 'Total Shift'
		FROM 
		cavis a  left outer join login b on a.nim = b.nim 
		left outer join logout c on b.idlogin = c.idlogin
		group by a.nim
	     ";
		$hasil = mysql_query($sqlstr) or die(mysql_error());
?>
<html>
<head>
	<title>Admin: Summary</title>
	<link type="text/css" rel= "stylesheet" href="../assets/css/cavis.css" />
</head>
<body>
	<div class= "header">
		<img src="../assets/img/logo bslc.png" width="150px" height="150px" />
		<p class= "title"> Absen Cavis Nindya 9G </p>

		<div class = "nav">
  			<ul>
  				<li> <a href="../cavis/index.php">Data Cavis </a></li>
  				<li> <a href="../piket/index.php">Data Absen Piket </a></li>
  				<li> <a href="#">Summary Piket </a></li>
  				<li> <a href="#">Logout </a></li>
  			</ul>
		</div>
	</div>
	<div class="left">
		<table border= "1">
			<tr>
				<td>Nama</td>
				<td>NIM</td>
				<td>Total Menit</td>
				<td>Total Shift</td>
			</tr>

			<?php
			while($row = mysql_fetch_array($hasil) )
			{
			?>
				<tr>
					<td> <?php echo $row['nim']; ?> </td>
					<td> <?php echo $row['nama']; ?> </td>
					<td> <?php echo $row['Total Menit']; ?> </td>
					<td> <?php echo $row['Total Shift']; ?> </td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
	
</body>
</html>
<?php 
}
else
{
	header('location:../admin/index.php');
}
?>