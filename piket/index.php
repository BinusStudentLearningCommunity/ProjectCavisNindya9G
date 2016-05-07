<?php
session_start();
if (isset($_SESSION['admin'])) 
{ 
	include('../database/connect.php');
	$sqlstr = "SELECT a.nim, 
						nama, 
						jamlogin, 
						jamlogout, 
						timestampdiff(MINUTE,jamlogin,jamlogout) AS 'menit'
					FROM 
						cavis a  join login b on a.nim = b.nim 
								left outer join logout c on b.idlogin = c.idlogin";
	$hasil = mysql_query($sqlstr,$conn);

?>
<html>
<head>
	<title>Admin: Piket</title>
	<link type="text/css" rel= "stylesheet" href="../assets/css/cavis.css" />
</head>
<body>
	<div class= "header">
		<img src="../assets/img/logo bslc.png" width="150px" height="150px" />
		<p class= "title"> Absen Cavis Nindya 9G </p>

		<div class = "nav">
  			<ul>
  				<li> <a href="../cavis/index.php">Data Cavis </a></li>
  				<li> <a href="#">Data Absen Piket </a></li>
  				<li> <a href="../summary/index.php">Summary Piket </a></li>
  				<li> <a href="#">Logout </a></li>
  			</ul>
		</div>
	</div>
	<div class="left">
		<table border= "1">
			<tr>
				<td>Nama</td>
				<td>NIM</td>
				<td>Jam Login</td>
				<td>Jam Logout</td>
				<td>Total Menit</td>
			</tr>

			<?php
			while($row = mysql_fetch_array($hasil) )
			{
			?>
				<tr>
					<td> <?php echo $row['nim']; ?> </td>
					<td> <?php echo $row['nama']; ?> </td>
					<td> <?php echo $row['jamlogin']; ?> </td>
					<td> <?php echo $row['jamlogout']; ?> </td>
					<td> <?php echo $row['menit']; ?> </td>
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