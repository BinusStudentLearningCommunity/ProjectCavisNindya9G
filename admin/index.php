<!-- 
  Front-end: Indra
  Back-end: Erwin
-->
<html>
<head>
<title>Login Admin</title>
<link href="../assets/css/button.css" rel="stylesheet" type="text/css">
<link href="../assets/css/textbox.css" rel="stylesheet" type="text/css">
</head>

<body>

<form method="post" action="login.php">
<table width="1103" border="0">
  <tr>
    <td width="343" height="194"><h2>&nbsp;</h2></td>
   <td width="673" align="center"><h1 style="font-family:Verdana, Geneva, sans-serif">Login Admin</h1></td>
    <td width="73">&nbsp;</td>
  </tr>
  <tr>
     <td width="343" height="113" align="right"><b><h3 style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Password</h3></b></td>
    <td align="center"><input type="password" name="password1" id="password" size="70px" class=" tb5"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">
      <input type="submit" name="button" id="button" value="Login Admin" class="btn" size="70px">
      <?php 
      if (isset($_GET['msg'])) {
        echo $_GET['msg'];
      }
       ?>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

</body>
</html>