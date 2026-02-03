<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>agregat jemaat berdasar pekerjaan</title>
</head>

<body>
<b>Data Agregat Jemaat Berdasar Status Keanggotaan:</b>
<hr color="#FF9900" size="1" width="98%" align="left" /><br>

1. Status Keanggotaan Aktif.
<br>
<? require("include/config.php"); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#E9E9E9">
    <td width="19%" rowspan="2">Wilayah</td>
    <td colspan="2">Jumlah</td>
    <td width="33%" rowspan="2">Jumlah</td>
    <td width="17%" rowspan="2">Action</td>
  </tr>
  <tr align="center" bgcolor="#E9E9E9">
    <td width="15%">Laki-laki</td>
    <td width="16%">Prempuan</td>
  </tr>
  <tr align="center">
    <td>Wilayah I </td>
    <td><? 
	$tahun=date('Y');
    {$wil=01;$cowok='L';$cewek='P';$status="aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=01&status=aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$status="aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=02&status=aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III  </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$status="aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=03&status=aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$status="aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=04&status=aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$status="aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=05&status=aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$status="aktif"; 
	include"f_status.php";
	echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
2. Status Keanggotaan Tidak Aktif.
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#E9E9E9">
    <td width="19%" rowspan="2">Wilayah</td>
    <td colspan="2">Jumlah</td>
    <td width="33%" rowspan="2">Jumlah</td>
    <td width="17%" rowspan="2">Action</td>
  </tr>
  <tr align="center" bgcolor="#E9E9E9">
    <td width="15%">Laki-laki</td>
    <td width="16%">Prempuan</td>
  </tr>
  <tr align="center">
    <td>Wilayah I </td>
    <td><? 
	$tahun=date('Y');
    {$wil=01;$cowok='L';$cewek='P';$status="tidak aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=01&status=tidak aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$status="tidak aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=02&status=tidak aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$status="tidak aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=03&status=tidak aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$status="tidak aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=04&status=tidak aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$status="tidak aktif"; 
	include"f_status.php";
	echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_aktif&wil=05&status=tidak aktif">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$status="tidak aktif"; 
	include"f_status.php";
	echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
