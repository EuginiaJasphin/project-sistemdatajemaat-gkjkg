<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>agregat jemaat berdasar pekerjaan</title>
</head>

<body>
<b>Data Agregat Jemaat Berdasar Pekerjaan :</b>
<hr color="#FF9900" size="1" width="98%" align="left" /><br>

1. Jenis Pekerjaan : PNS.
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
    {$wil=01;$cowok='L';$cewek='P';$pekerjaan="PNS"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=01&pekerjaan=PNS">lihat detail </a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$pekerjaan="PNS"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=02&pekerjaan=PNS">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III  </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$pekerjaan="PNS"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=03&pekerjaan=PNS">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$pekerjaan="PNS"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=04&pekerjaan=PNS">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="PNS"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=05&pekerjaan=PNS">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="PNS"; 
	include"f_kerja.php";echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
2. Jenis Pekerjaan : TNI / POLRI. <br>
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
    {$wil=01;$cowok='L';$cewek='P';$pekerjaan="TNI/POLRI"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=01&pekerjaan=TNI/POLRI">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$pekerjaan="TNI/POLRI"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=02&pekerjaan=TNI/POLRI">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$pekerjaan="TNI/POLRI"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=03&pekerjaan=TNI/POLRI">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$pekerjaan="TNI/POLRI"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=04&pekerjaan=TNI/POLRI">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="TNI/POLRI"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=05&pekerjaan=TNI/POLRI">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="TNI/POLRI"; 
	include"f_kerja.php";echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
3. Jenis Pekerjaan : Wiraswasta <br>
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
    {$wil=01;$cowok='L';$cewek='P';$pekerjaan="Wiraswasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=01&pekerjaan=Wiraswasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$pekerjaan="Wiraswasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=02&pekerjaan=Wiraswasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$pekerjaan="Wiraswasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=03&pekerjaan=Wiraswasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$pekerjaan="Wiraswasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=04&pekerjaan=Wiraswasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Wiraswasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=05&pekerjaan=Wiraswasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Wiraswasta"; 
	include"f_kerja.php";echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
4. Jenis Pekerjaan : Karyawan Swasta<br>
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
    {$wil=01;$cowok='L';$cewek='P';$pekerjaan="Karyawan Swasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=01&pekerjaan=Karyawan Swasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$pekerjaan="Karyawan Swasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=02&pekerjaan=Karyawan Swasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$pekerjaan="Karyawan Swasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=03&pekerjaan=Karyawan Swasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$pekerjaan="Karyawan Swasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=04&pekerjaan=Karyawan Swasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Karyawan Swasta"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=05&pekerjaan=Karyawan Swasta">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Karyawan Swasta"; 
	include"f_kerja.php";echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
5. Jenis Pekerjaan : Buruh dan Tani<br>
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
    {$wil=01;$cowok='L';$cewek='P';$pekerjaan="Buruh-tani"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=01&pekerjaan=Buruh-tani">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$pekerjaan="Buruh-tani"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=02&pekerjaan=Buruh-tani">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$pekerjaan="Buruh-tani"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=03&pekerjaan=Buruh-tani">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$pekerjaan="Buruh-tani"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=04&pekerjaan=Buruh-tani">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Buruh-tani"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=05&pekerjaan=Buruh-tani">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Buruh-tani"; 
	include"f_kerja.php";echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
6. Jenis Pekerjaan : Pensiun<br>
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
    {$wil=01;$cowok='L';$cewek='P';$pekerjaan="Pensiun"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=01&pekerjaan=Pensiun">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$pekerjaan="Pensiun"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=02&pekerjaan=Pensiun">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$pekerjaan="Pensiun"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=03&pekerjaan=Pensiun">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$pekerjaan="Pensiun"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=04&pekerjaan=Pensiun">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Pensiun"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=05&pekerjaan=Pensiun">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Pensiun"; 
	include"f_kerja.php";echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
7. Jenis Pekerjaan : Tidak Bekerja<br>
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
    {$wil=01;$cowok='L';$cewek='P';$pekerjaan="Tidak Bekerja"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=01&pekerjaan=Tidak Bekerja">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$pekerjaan="Tidak Bekerja"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=02&pekerjaan=Tidak Bekerja">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$pekerjaan="Tidak Bekerja"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=03&pekerjaan=Tidak Bekerja">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$pekerjaan="Tidak Bekerja"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=04&pekerjaan=Tidak Bekerja">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Tidak Bekerja"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=05&pekerjaan=Tidak Bekerja">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="Tidak Bekerja"; 
	include"f_kerja.php";echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
8. Jenis Pekerjaan : Tanpa keterangan<br>
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
    {$wil=01;$cowok='L';$cewek='P';$pekerjaan="No data"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=01&pekerjaan=No data">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah II </td>
    <td><? 
	$tahun=date('Y');
    {$wil=02;$cowok='L';$cewek='P';$pekerjaan="No data"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=02&pekerjaan=No data">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah III </td>
    <td><? 
	$tahun=date('Y');
    {$wil=03;$cowok='L';$cewek='P';$pekerjaan="No data"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=03&pekerjaan=No data">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah IV </td>
    <td><? 
	$tahun=date('Y');
    {$wil=04;$cowok='L';$cewek='P';$pekerjaan="No data"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=04&pekerjaan=No data">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td>Wilayah v </td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="No data"; 
	include"f_kerja.php";echo $j_laki; 
	?></td>
    <td><?= $j_perempuan; ?></td>
    <td><?= $j_jml; }?></td>
    <td><a href="?act=kel_kerja&wil=05&pekerjaan=No data">lihat detail</a></td>
  </tr>
  <tr align="center">
    <td><b>Jumlah</b></td>
    <td><? 
	$tahun=date('Y');
    {$wil=05;$cowok='L';$cewek='P';$pekerjaan="No data"; 
	include"f_kerja.php";echo $jb_laki; 
	?></td>
    <td><?= $jb_perempuan; ?></td>
    <td><?= $jb_jml; }?></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
