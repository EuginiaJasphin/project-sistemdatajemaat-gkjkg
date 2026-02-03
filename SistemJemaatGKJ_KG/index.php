<?
// gunakan variabel session pada halaman ini.
// fungsi ini harus diletakkan di awal halaman.
session_start();
////// Bagian Logout. Delete variabel session.
unset($_SESSION['user']);
session_destroy();
$message="";

////// Bagian Login.
$Login=$_POST['Login'];

if($Login){ // jika tombol Login diklik.
   $username=$_POST['username'];
   // Encrypt password dengan fungsi md5().
   $tgl=$_POST['tanggal'];
   $bln=$_POST['bulan'];
   $thn=$_POST['tahun'];
   //$password=$_POST['password'];
   //include("../include/conecsi.inc");
   // Connect ke database.
   $host="localhost"; // Host name.
   $db_user="root"; // MySQL username.
   $db_password=""; // MySQL password.
   $database="db_gkj"; // Database.
   mysql_connect($host,$db_user,$db_password);
   mysql_select_db($database);

   // Cocokkan  username dan password.
   $result=mysql_query("select * from tbl_jemaat where id_jemaat='$username' and tgl='$tgl' and bln='$bln' and thn='$thn'");
   while($row = mysql_fetch_array($result)){
    $idjemaat= $row['id_jemaat'];
   }
   // Jika cocok.
   if(mysql_num_rows($result)!='0'){
       //session_register("user"); // buat session username.
       //header("location:main.php"); // Re-direct ke main.php
       $_SESSION['idjemaat'] = $idjemaat;
       header("location:main.php"); // Re-direct ke main.php
       exit;
   } else{ // Jika tidak cocok.
      $message=":: ulangi dgn username dan password yg benar";
   }
} // akhir dari otorisasi Login.

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Login</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {color: #000000}
-->
</style>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="493" height="292" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="images/bg_login.jpg"><br><br>
<form id="form1" name="form1" method="post" action="<? echo $PHP_SELF; ?>">
<table width="319" align="right" class="content3">
   <tr>
     <td width="37" class="putih2">&nbsp;</td>
     <td width="11" class="putih2">&nbsp;</td>
     <td colspan="2" class="putih2">&nbsp;</td>
   </tr>
   <tr>
     <td class="putih2">ID</td>
     <td class="putih2">: </td>
     <td colspan="2" class="putih2"><input name="username" type="text" id="username" /></td>
   </tr>
   <tr>
     <td class="putih2">Tgl<br> 
       Lahir  </td>
     <td class="putih2">: </td>
     <td colspan="2" class="putih2"><select name="tanggal">
       <option>tgl</option>
       <option value="01">01</option>
       <option value="02">02</option>
       <option value="03">03</option>
       <option value="04">04</option>
       <option value="05">05</option>
       <option value="06">06</option>
       <option value="07">07</option>
       <option value="08">08</option>
       <option value="09">09</option>
       <?php for ($i=10; $i <= 31; $i++) {
      if ($i == $outdate){ $selectdate ="selected";} else {$selectdate="";
      }echo ("<option value=\"$i\" $selectdate>$i</option>"."\n");}
      ?>
     </select>
/
<select name="bulan">
  <option value="bln">bln</option>
  <option value="01">Januari</option>
  <option value="02">Februari</option>
  <option value="03">Maret</option>
  <option value="04">April</option>
  <option value="05">Mei</option>
  <option value="06">Juni</option>
  <option value="07">Juli</option>
  <option value="08">Agustus</option>
  <option value="09">September</option>
  <option value="10">Oktober</option>
  <option value="11">November</option>
  <option value="12">Desember</option>
</select>
/
<select name="tahun">
  <option value="thn">thn</option>
  <?php for ($i=1930; $i <= 2020; $i++) { if ($i == $outyear){ $selectyear ="selected";
		} else {        
		$selectyear="";}
        echo ("<option value=\"$i\" $selectyear>$i</option>"."\n");}
        ?>
</select></td>
   </tr>
   <tr>
     <td class="putih2">&nbsp;</td>
     <td class="putih2">&nbsp;</td>
     <td colspan="2" class="putih2"><input name="Login" type="submit" id="Login" value="login"/></td>
   </tr>
   <tr>
     <td class="putih2">&nbsp;</td>
     <td class="putih2">&nbsp;</td>
     <td colspan="2" class="putih2">&nbsp;</td>
   </tr>
   <tr>
     <td height="31" class="putih2">&nbsp;</td>
     <td class="putih2">&nbsp;</td>
     <td width="158" class="putih2">&nbsp;</td>
     <td width="93" class="putih2"></td>
   </tr>
   <tr>
     <td height="31" colspan="4" class="putih2"><?= $message ?></td>
     </tr>
</table>
</form></td>
  </tr>
</table>
<br>
</body>
</html>