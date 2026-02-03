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
<script type="text/javascript" src="../js/jemaat.js"></script>
<script type="text/javascript" src="../js/pendidikan.js"></script><script type="text/javascript" src="../js/pekerjaan.js"></script>
<script type="text/javascript" src="../js/pernikahan.js"></script><script type="text/javascript" src="../js/anak.js"></script>
<script type="text/javascript" src="../js/baptis.js"></script><script type="text/javascript" src="../js/usaha.js"></script>
<script type="text/javascript" src="../js/ninggal.js"></script><script type="text/javascript" src="../js/keluar.js"></script>

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
<div align="center">
<div align="center">&nbsp;&nbsp;<img src="../images/header_admin.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?adm=home">Home</a> | <a href="?adm=petunjuk">Petunjuk </a> | <a href="?adm=in_data">Entry Data Jemaat</a> | <a href="?adm=in_data2">Data Jemaat Meninggal Dunia</a> | <a href="?adm=in_data3">Data Jemaat Atestasi Keluar</a> | <a href="logout.php">Logout </a></div>
<table width="860" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><?php
switch ($_REQUEST['adm'])

{
	case ''		  				:include "home_admin.php"; break;
	case 'home'		  			:include "home_admin.php"; break;
	case 'petunjuk'		  		:include "petunjuk.php"; break;
	case 'in_data'				:include "in_data.php"; break;
	case 'in_data2'				:include "in_data_meninggal.php"; break;
	case 'in_data3'				:include "in_data_atestasi.php"; break;
	}

  ?>
  </td>
</tr>
</table>
 Sistem data jemaat GKJ Jogja Selatan<br />
Sekretariat : Jl. Depokan II Nomor 184 Kotagede Yogyakarta 55172. <br />
Telp. (0274) 375010, email info@gkj-kotagede.com</div>
</body>
</html>
