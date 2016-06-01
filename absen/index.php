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

<body background="bona123.jpg">
<div style="height:30"></div>
<div class="row">
<div class="col-md-1" ></div>
<div  class="col-md-11" style="width:200; height:200"><img class="img-responsive" src="logoBSLC.png"></div>
</div>
<form action="loginnindya.php" method="post">
<div class="container" style="height:20"></div>
<div class="row">
  <div class="col-md-2" style="text-align:right; font-size:30px; font-family:Arial, Helvetica, sans-serif; color:#09F">NIM</div>
  <div class="col-md-6" style="height:30"><input type="text" name="NIM" style="height:40; width:520;font-size:26px;text-align:center" class="form-control" placeholder="Masukkan NIM Anda"></div>
  <div><input name="input" style="width:300" type="submit" value="Login" class="btn btn-info btn-lg"></div>
</div>

<div class="row">
  <div class="col-md-8"></div>
  <div class="col-md-4">
	<!-- Isi pesan setelah Login -->
  <?php //Message setelah Login / Logout / GAGAL login
    if (isset($_GET['msg'])) //jika ada message maka ...
    {
      echo $_GET['msg']; //tuliskan message: "Log [IN/OUT] : [Nama Cavis]\n 2016-MM-DD jj:mm:dd [am/pm]"
    }
  ?>
</div>
</div>
<br>


<!--<div class="row">  
  <div class="col-md-3"></div>
  <div class="col-md-4"> -->
    <!-- <button class="btn btn-info btn-lg" style="width:300">  <input name="input" type="submit" value="Login" class="btn btn-info btn-lg"> <!--  </button> -->
<!--  </div> -->


<div class="row">
  <div class="col-md-7" style="width:875"></div>
  <div class="col-md-3" style="height:40">
  <div style="font-size:28px;text-align:center; color:#FFF;background-color:#09F; width:450"><b>PICKET LIST</b></div></div>
  </div>

  <div class="container"></div>
  <div class="row">
  <div class="col-md-9" style="width:890"></div>
  <div class="col-md-3" style="height:200;width:450;background-color:#FFF">
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
  </div>


  <!-- Note to INDRA : tolong taro tombol admin ini ya, dari <a href= ...> sampai </a>-->
  <!-- Tombol Admin -->
  <!-- <a href="../admin/index.php" target="_blank"><img src="../assets/img/icon_admin_128.png" width="57" height="44"></a> -->
</div>
</form>

</body>
</html>
