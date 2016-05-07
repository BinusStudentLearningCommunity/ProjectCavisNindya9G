<?php 
session_start();
if (isset($_SESSION['admin'])) 
{
?>
<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel= "stylesheet" href="../assets/css/cavis.css" />
		<title> Admin: Cavis </title>
	</head>

	<body>

		<div class= "header">
			<img src="../assets/img/logo bslc.png" width="150px" height="150px" />
			<p class= "title"> Absen Cavis Nindya 9G </p>

			<div class = "nav">
	  			<ul>
	  				<li> <a href="#">Data Cavis </a></li>
	  				<li> <a href="../piket/index.php">Data Absen Piket </a></li>
	  				<li> <a href="../summary/index.php">Summary Piket </a></li>
	  				<li> <a href="../admin/logout.php">Logout </a></li>
	  			</ul>
			</div>
		</div>

		<div class= "left">
			
			<form action="insert.php" method="post">
			<h1>insert new item</h1>
			<table>
				<tr>
					<td>NIM</td>
					<td> <input name="nim" type="text"/> </td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input name="nama" type="text"/></td>
				</tr>
				
				<tr>
					<td>
						<input name="submit" type="submit" value="submit"/>
					</td>
				</tr>
			</table>
		</form>
			
			<?php
				include('../database/connect.php');

				$query = "SELECT * FROM cavis";

				$result = mysql_query($query);
			?>

		<table border="1" width="50%">
		<tr>
			<td>NIM</td>
			<td>Nama</td>
			<td>Action</td>
			
		</tr>

		<?php 
			while($data = mysql_fetch_array($result))
			{
		 ?>
			<tr>
				<td> 
					<?php echo $data['nim'] ?> 
				</td>
				<td> 
				<?php echo $data['nama'] ?> 
				</td>

				<form action="delete.php" method="get" >
				<td><input name="submitDelete" type="submit" value="delete"/> </td>
				<input type="hidden" name="nim" value="<?= $data['nim']?>">
			
				</form>
			</tr>
			
		<?php 
			} //end while
		 ?>
			
			 </table>
		</div>

		
	</body>
</html>

<?php
} //end if
else
{
	header('location:../admin/index.php');
}
 ?>

 <!-- Comment 

 -->