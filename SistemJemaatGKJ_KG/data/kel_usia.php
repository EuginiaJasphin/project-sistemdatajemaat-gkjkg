<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: kelompok usia ::</title>
</head>

<body>
<div align="center">DATA JEMAAT BERDASARKAN KELOMPOK USIA<br>
  Kelompok Usia
  : 
  <?= $_REQUEST['kel']; ?><br>
Wilayah : <?= $_REQUEST['wil']; ?></div><hr color="#FF9900" size="1" align="left" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#E9E9E9">
    <td width="3%">No.</td>
    <td width="10%">ID-Jemaat</td>
    <td width="16%">Nama jemaat </td>
    <td width="11%">Jenis kelamin </td>
    <td width="21%">Tanggal Lahir </td>
    <td width="23%">Nama orangtua </td>
    <td width="16%">Data detail 
    <?
	include_once("include/config.php");
	$tahun=date('Y');
	$wil=$_REQUEST['wil'];
	$range=$_REQUEST['range'];
	$kel= mysql_query("SELECT * FROM tbl_jemaat WHERE ket=$wil AND thn BETWEEN $range ORDER BY jkel ASC"); 
	$no=1;
    while($data= mysql_fetch_array($kel))
    {?></td>
  </tr>
  <tr>
    <td><?= $no++; ?></td>
    <td><?= $data['id_jemaat'];?></td>
    <td><?= $data['nama_jemaat'];?></td>
    <td><?= $data['jkel'];?></td>
    <td><?= $data['tgl'];?>/<?= $data['bln'];?>/<?= $data['thn'];?></td>
    <td><?= $data['nama_orangtua'];?></td>
    <td><a href="?act=data_detail&wil=<?= $_REQUEST['wil']; ?>&id=<?= $data['id_jemaat'];?>">detail</a><? }?></td>
  </tr>
</table>
</body>
</html>
