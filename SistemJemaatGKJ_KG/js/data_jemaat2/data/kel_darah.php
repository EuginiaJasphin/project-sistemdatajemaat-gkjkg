<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: kelompok usia ::</title>
</head>

<body>
<div align="center">DATA JEMAAT BERDASARKAN GOLONGAN DARAH <br>
  Golongan Darah
  : 
  <?= $_REQUEST['gol']; ?><br>
Wilayah : <?= $_REQUEST['wil']; ?></div><hr color="#FF9900" size="1" align="left" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#E9E9E9">
    <td width="3%">No.</td>
    <td width="15%">ID-Jemaat</td>
    <td width="20%">Nama jemaat </td>
    <td width="18%">Jenis kelamin </td>
    <td width="28%">Tanggal Lahir </td>
    <td width="16%">Data detail 
    <?
	include_once("include/config.php");
	$wil=$_REQUEST['wil'];
	$gol=$_REQUEST['gol'];
	$kel= mysql_query("SELECT * FROM tbl_jemaat WHERE ket=$wil AND goldarah='$gol' ORDER BY jkel ASC"); 
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
    <td><a href="?act=data_detail&wil=<?= $_REQUEST['wil']; ?>&id=<?= $data['id_jemaat'];?>">detail</a><? }?></td>
  </tr>
</table>
</body>
</html>
