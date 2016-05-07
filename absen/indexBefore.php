<!-- 
  Absensi Cavis 9G
  Front End by Indra
  Back End by Jorvan
-->

<?php 
//Picketlist code
// using variable $picketlist to hold the name list
  include('../database/connect.php');
  $picketing = NULL;

  $query = "SELECT c.nama FROM 
  cavis c join login lin 
  on c.nim=lin.nim 
  left outer join logout lout 
  on lin.idLogin=lout.idLogin
  where lin.idLogin not in
  (
      SELECT idLogin from logout
  ) AND DATE(jamLogin) = CURDATE()";
  $result = mysql_query($query) or die(mysql_error());
  $i=0;
  while($row = mysql_fetch_assoc($result))
  {
    $picketing[$i] = $row['nama'];
    $i = $i+1;
  }
//end picketlist code
?>

<html>
<head>
<title>OJT 9G Absence System</title>
<link href="../assets/css/button.css" rel="stylesheet" type="text/css">
<link href="../assets/css/textbox.css" rel="stylesheet" type="text/css">
</head>

<body>
<form action="loginnindya.php" method="post">
  <!-- <table width="1307" height="605" border="0"> -->
  <table width="1307" height="605" border="0">
    <!-- Row 1 -->
    <tr>
      <!-- Image -->
      <td width="200" height="200" align="center"><img src="../assets/img/logo bslc.png" width="200" height="200"/></td>

      <!-- Title -->
      <td align="center" width="730">
        <h1 font style="font-family:Arial, Helvetica, sans-serif; color:#0FC">
          OJT 9G Absence System <br>
          Binus Student Learning Community
        </h1>
      </td>

      <td>
        Last Updated: 14-2-2016
      </td>
    </tr>

    <!-- Row 2 -->
    <tr>
      <!-- NIM text -->
      <td height="89" ><h1 align="right" style="color:#0FC; padding-top:20">NIM</h1></td>

      <!-- textfield -->
      <td><input type="text" name="NIM" id="textfield" class="tb5"></td>

      <!-- Picket List -->
      <td rowspan="2" valign="top">
        <!-- Picket List Table -->
        <table width="350" height="300" border="1">
          <tr align="right">
            <td height="40" bgcolor="#00CCCC" align="center" font style="color: #FFF"><h3>Picket List</h3></td>
          </tr>
          <tr>
            <td height="230" valign="top">
              <div style="overflow:scroll; height:270px;">
              <?php 
              for ($i=0; $i < count($picketing); $i++) { 
                echo ($i+1).". ".$picketing[$i]."<br>";
              }                
              ?>
              </div>
            </td>
          </tr>
        </table>
      </td>
      <!-- End Picket List -->
    </tr>

    <!-- Row 3 -->
    <tr>
      <td height="130">&nbsp;</td>

      <td width="207" valign="top">

      <!--LOGIN Button-->
      <input name="input" type="submit" value="Login" class="btn">

      <!-- MESSAGE -->
        <?php 
          if (isset($_GET['msg'])) {
            echo $_GET['msg'];
          }
        ?>
      <!--END MESSAGE -->
      </td>
    </tr>

    <tr>
      <td height="77">&nbsp;</td>

      <td></td>

      <!-- Admin Button -->
      <td align="center"><a href="../admin/index.php" target="_blank"><img src="../assets/img/icon_admin_128.png" width="57" height="44"></a></td>
    </tr>

  </table>
</form>

</body>
</html>