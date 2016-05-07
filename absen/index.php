<!-- 
  Absensi Cavis 9G
  Front End by Indra
  Back End by Jorvan
-->

<?php 
//Picketlist code
// kode untuk mencari cavis yg piket
// variable $picketlist adalah array berisi nama-nama cavis
  include('../database/connect.php');
  $picketing = NULL;

  //query SQL mencari cavis yg sedang login
  $query = "SELECT c.nama FROM 
  cavis c join login lin 
  on c.nim=lin.nim 
  left outer join logout lout 
  on lin.idLogin=lout.idLogin
  where lin.idLogin not in
  (
      SELECT idLogin from logout
  ) AND DATE(jamLogin) = CURDATE()";

  $result = mysql_query($query) or die(mysql_error()); //jalankan query
  $i=0; //variable untuk looping
  while($row = mysql_fetch_assoc($result)) //ambil satu baris data dr SQL
  {
    $picketing[$i] = $row['nama'];
    $i = $i+1;
  }
//end picketlist code
?>

<html>
<head>
<title>Absensi Cavis Nindya 9G</title>
<link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../assets/css/absen2.css" rel="stylesheet" type="text/css">
</head>

<body background="../assets/img/desain absensi.jpg">

<form action="loginnindya.php" method="post">
<div class="container" style="height:300"></div>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8" style="height:60"><input type="text" name="NIM" style="height:30; width:520;font-size:28px;text-align:center"></div>
</div>

<div class="row">  
  <div class="col-md-3"></div>
  <div class="col-md-4">
    <button type="button" class="btn btn-info btn-lg" style="width:300" value="Login">Login</button>
  </div>

  <?php //Message setelah Login / Logout / GAGAL login
    if (isset($_GET['msg'])) //jika ada message maka ...
    {
      echo $_GET['msg']; //tuliskan message: "Log [IN/OUT] : [Nama Cavis]\n 2016-MM-DD jj:mm:dd [am/pm]"
    }
  ?>

  <div class="col-md-7" style="height:220;width:50"></div>
  <div>
    <nav>
      <ul style="font-size:18px">
        <?php 
          //looping untuk print nama-nama yg sudah login
          for ($i=0; $i < count($picketing); $i++) { 
            echo "<li class=\"list-unstyled\">" . $picketing[$i] . "</li>";
          }                
        ?>
        <!-- <li class="list-unstyled">Indra</li>
        <li class="list-unstyled">Indra</li>
        <li class="list-unstyled">Indra</li>
        <li class="list-unstyled">Bona</li> -->
      </ul>
    </nav>
  </div>

  <!-- Note to INDRA : tolong taro tombol admin ini ya, dari <a href= ...> sampai </a>-->
  <!-- Tombol Admin -->
  <!-- <a href="../admin/index.php" target="_blank"><img src="../assets/img/icon_admin_128.png" width="57" height="44"></a> -->
</div>
</form>

</body>
</html>
