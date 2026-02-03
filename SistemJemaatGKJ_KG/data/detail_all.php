<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: kelompok usia ::</title>
</head>

<body>
<div align="center"><h4>DATA DETAIL JEMAAT GKJ-KOTAGEDE</h4><br>
  <?
	include_once("include/config.php");
	$wil=$_REQUEST['wil'];
	$kel= mysql_query("SELECT * FROM tbl_jemaat WHERE ket=$wil AND id_jemaat='$_REQUEST[id]' ORDER BY id_jemaat ASC"); 
	$no=1;
    while($data= mysql_fetch_array($kel))
    {?>
</div>
<hr color="#FF9900" size="1" align="left" width="100%">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" bgcolor="#FFE8FF" align="center">DATA DIRI JEMAAT</td>
  </tr>
  <tr>
    <td width="184">Wilayah</td>
    <td width="388">: 
    <?= $data['ket'];?></td>
    <td width="388" rowspan="5" valign="top"><img src="images/foto/<?php if ($data['foto']==''){echo "no_image.png";} {echo $data['foto'];} ?>" width="120" height="150"></td>
  </tr>
  <tr>
    <td>ID-Jemaat</td>
    <td>: 
    <?= $data['id_jemaat'];?></td>
  </tr>
  <tr>
    <td>Status Keanggotaan </td>
    <td>: 
    <?= $data['status'];?></td>
  </tr>
  <tr>
    <td>Nama Jemaat </td>
    <td>: 
    <?= $data['nama_jemaat'];?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin </td>
    <td>: 
    <?= $data['jkel'];?></td>
  </tr>
  <tr>
    <td>Tempat, Tanggal lahir </td>
    <td colspan="2">:
    <?= $data['ttl'];?> , 
    <?= $data['tgl'];?>-<?= $data['bln'];?>-<?= $data['thn'];?></td>
  </tr>
  <tr>
    <td>Golongan Darah </td>
    <td colspan="2">: 
    <?= $data['goldarah'];?></td>
  </tr>
  <tr>
    <td>Pendidikan Terakhir </td>
    <td colspan="2"> : 
      <?= $data['pendterakhir'];?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td colspan="2">: 
	<? if (($data['anak']=='anak') || ($data['anak']=='cucu') || ($data['anak']=='keponakan') || ($data['anak']=='orantua')) {
	$orangtua=$data['nama_orangtua'];
	$anak= mysql_query("SELECT * FROM tbl_jemaat WHERE id_jemaat='$orangtua'"); 
    while($dat= mysql_fetch_array($anak))
    { echo $dat['alamat'];echo ",&nbsp;"; echo $dat['kelurahan'];echo ",&nbsp;"; echo $dat['kecamatan'];echo ",&nbsp;"; 
	echo $dat['kota']; 
	echo "</td><tr><td>Nama Orangtua</td><td> : $dat[nama_jemaat]</td></tr>"; }}
	
	else if ($data['anak']=='Isteri') {
	$pasangan=$data['pasangan'];
	$pasangan= mysql_query("SELECT * FROM tbl_jemaat WHERE id_jemaat='$pasangan'"); 
    while($pas= mysql_fetch_array($pasangan))
    { echo $pas['alamat'];echo ",&nbsp;"; echo $pas['kelurahan'];echo ",&nbsp;"; echo $pas['kecamatan'];echo ",&nbsp;"; 
	echo $pas['kota']; 
	echo "</td><tr><td>Nama Suami</td><td> : $pas[nama_jemaat]</td></tr>";
	
	 }}else {
	echo $data['alamat'];echo ",&nbsp;"; echo $data['kelurahan']; echo ",&nbsp;"; echo $data['kecamatan']; echo ",&nbsp;"; 
	echo $data['kota']; }?></td>
  </tr>
  <tr>
    <td>No.HP </td>
    <td colspan="2">: 
    <?= $data['no_hp'];?>      <? }?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#FFE8FF" align="center">DATA PEKERJAAN JEMAAT    
    <?
	include_once("include/config.php");
	$ker= mysql_query("SELECT * FROM tbl_pekerjaan WHERE id_jemaat='$_REQUEST[id]'"); 
    while($datker= mysql_fetch_array($ker))
    {?></td>
  </tr>
  <tr>
    <td width="184">Jenis Pekerjaan </td>
    <td width="776">:      
    <?= $datker['jenispekerjaan'];?></td>
  </tr>
  <tr>
    <td>Tempat Kerja </td>
    <td>:      
    <?= $datker['tempatkerja'];?></td>
  </tr>
  <tr>
    <td>Alamat Kerja </td>
    <td>:      
    <?= $datker['alamatkerja'];?></td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>:      
    <?= $datker['jabatan'];?></td>
  </tr>
  <tr>
    <td>No.Telp tempat kerja </td>
    <td>:      
    <?= $datker['notelp'];?><? }?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#FFE8FF" align="center">DATA BAPTIS JEMAAT 
    <?
	include_once("include/config.php");
	$bap= mysql_query("SELECT * FROM tbl_babtis WHERE id_jemaat='$_REQUEST[id]'"); 
    while($datbap= mysql_fetch_array($bap))
    {?></td>
  </tr>
  <tr>
    <td width="184">Gereja Babtis </td>
    <td width="776">: 
    <?
	$gerejababtis=$datbap['gerejababtis'];
	$sq = mysql_query("SELECT id_gereja,nama FROM tbl_gereja WHERE id_gereja='$gerejababtis'"); while($ro = mysql_fetch_array($sq)){
	echo $ro['nama']; }?></td>
  </tr>
  <tr>
    <td>Tanggal Babtis </td>
    <td>: 
    <?= $datbap['tanggalbabtis'];?></td>
  </tr>
  <tr>
    <td>No. Surat Babtis </td>
    <td>: 
    <?= $datbap['nosuratbabtis'];?></td>
  </tr>
  <tr>
    <td>Pendeta Babtis </td>
    <td>: 
    <?= $datbap['pendetababtis'];?>
    <? }?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#FFE8FF" align="center">DATA SIDI JEMAAT 
    <?
	include_once("include/config.php");
	$bap= mysql_query("SELECT * FROM tbl_babtis WHERE id_jemaat='$_REQUEST[id]'"); 
    while($datbap= mysql_fetch_array($bap))
    {?></td>
  </tr>
  <tr>
    <td width="183">Gereja Sidi </td>
    <td width="777">: 
    <?
	$gerejababtis=$datbap['gerejasidi'];
	$sq = mysql_query("SELECT id_gereja,nama FROM tbl_gereja WHERE id_gereja='$gerejababtis'"); while($ro = mysql_fetch_array($sq)){
	echo $ro['nama']; }
	?></td>
  </tr>
  <tr>
    <td>Tanggal Sidi </td>
    <td>: 
    <?= $datbap['tanggalsidi'];?></td>
  </tr>
  <tr>
    <td>No. Surat Sidi </td>
    <td>: 
    <?= $datbap['nosuratsidi'];?>
    <? }?></td>
  </tr>
</table>
</body>
</html>