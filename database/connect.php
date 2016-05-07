<?php 
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cavis9g";

//create connection to localhost
$conn = mysql_connect($servername, $username, $password);
if(!$conn)
{
	die('Could not connect: '. mysql_error());
}

 //connection to $dbname
mysql_select_db($dbname, $conn) or die("Tidak ada database nya");

/*session_start();


$servername = "localhost";
$nim = "root";
$nama = "root";

// Create connection
$conn = mysqli_connect($servername, $nim, $nama,"cavis9g");


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$nim = $_POST['nim'];
$nama = md5($_POST['nama']);
$query = "select * from cavis9g where nim ='$nim' and nama = '$nama'";

$result = mysqli_query($conn, $query);
if($row = mysqli_fetch_array($result)) {
	$_SESSION['nim']= $row['nim'];
	header('Location:index.html');
}
else {
		echo "Invalid Id Password !";
}*/
// only process the form if $_POST isn't empty
/*if( ! empty( $_POST ) ) 
{
	//connect to mysql
	$mysqli = new mysqli( 'localhost', 'root', 'root', 'cavis9g' );

	//check the connection
	if( $mysqli->connect_error)
	{
		die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
	}

	//insert our data
	$sql = "INSERT INTO cavis (nim, nama) VALUES  ( '{$mysqli->real_escape_string($_POST['nim'])}', '{$mysqli->real_escape_string($_POST['nama'])}' )";
	$insert = $mysqli->query($sql);

	//print response from mysql
	if( $insert )
	{
		echo "Success! Row ID: {$mysqli->insert_id}";
	}
	else 
	{
		die("Error: {$mysqli->errno} : {$mysqli->error}");
	}

	//close our connection
	$mysqli->close();
}*/

?>