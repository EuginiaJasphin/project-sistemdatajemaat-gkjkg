<?

// Bagian PHP ini dapat disalin ke bagian atas file yang memerlukan akses setelah login.
// Gunakan variabel session pada halaman ini
//Fungsi ini harus diletakkan pada bagian atas halaman.
session_start();
// jika variabel session "username" tidak ada.

if (!isset($_SESSION['level']) && !isset($_SESSION['username']) && !isset($_SESSION['wilayah'])){
// Re-direct ke index.php
header("location:index.php");

}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Data Jemaat GKJ Jogja Selatan ::</title>
<!-- Page Halaman -->
<link rel="stylesheet" type="text/css" href="../css/style-page.css" />
<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css"/>

<!-- Milik entryan with java -->
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
  
<script type="text/javascript">
$(document).ready(function() {
$("#datepicker").datepicker();
});

$(document).ready(function() {
$("#datepicker2").datepicker();
});

$(document).ready(function() {
$("#datepicker3").datepicker();
});

$(document).ready(function() {
$("#datepicker4").datepicker();
});
</script>

	
</head>

<body >
<? 
$status=$_REQUEST['status'];
$status2=$_REQUEST['adm'];
if ($status=="datadiri"){ ?> <script type="text/javascript" src="../js/datajemaat.js"></script>
<? } elseif ($status2=="in_update") { ?><script type="text/javascript" src="../js/jemaat.js"></script>
<? } elseif ($status=="pendidikan") { ?><script type="text/javascript" src="../js/pendidikan.js"></script>
<? } elseif ($status=="pekerjaan") { ?><script type="text/javascript" src="../js/pekerjaan.js"></script>
<? } elseif ($status=="pernikahan") { ?><script type="text/javascript" src="../js/pernikahan.js"></script>
<? } elseif ($status=="anak") { ?><script type="text/javascript" src="../js/anak.js"></script>
<? } elseif ($status=="baptis") { ?><script type="text/javascript" src="../js/baptis.js"></script>
<? } elseif ($status=="usaha") { ?><script type="text/javascript" src="../js/usaha.js"></script>
<? }?>
<div align="center">
<div align="center">&nbsp;&nbsp;<img src="../images/header_admin.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?adm=home">HOME</a> | <a href="?adm=petunjuk">PETUNJUK </a> | <a href="?adm=in_menu">PENGELOLAAN DATA JEMAAT</a>| 
<?
if ($_SESSION['username']=='superadmin' ) {echo "<a href='../../central_gkjkg/main.php?adm=content'>KEMBALI </a>";} else { echo "<a href='logout.php'>LOGOUT </a>"; } ?></div>
<table width="860" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><?php
switch ($_REQUEST['adm'])

{
	case ''		  				:include "home_admin.php"; break;
	case 'home'		  			:include "home_admin.php"; break;
	case 'petunjuk'		  		:include "petunjuk.php"; break;
	case 'in_menu'				:include "in_menu.php"; break;
	case 'in_update'			:include "in_update.php"; break;
	case 'in_data'				:include "in_data.php"; break;
	case 'in_data2'				:include "in_data_meninggal.php"; break;
	case 'in_data3'				:include "in_data_atestasi.php"; break;
	}

  ?>
  </td>
</tr>
</table>
 Sistem data jemaat GKJ Kotagede <br />
Sekretariat : Jl. Depokan II Nomor 184 Kotagede Yogyakarta 55172. <br />
Telp. (0274) 375010, email: gkj.kotagede@yahoo.com </div>
</body>
</html>
