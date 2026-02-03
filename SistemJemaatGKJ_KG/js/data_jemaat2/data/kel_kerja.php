<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: kelompok usia ::</title>
</head>

<body>
<div align="center">DATA JEMAAT BERDASARKAN PEKERJAAN <br>
  Jenis Pekerjaan :
<?= $_REQUEST['pekerjaan']; ?><br>
Wilayah : <?= $_REQUEST['wil']; ?></div><hr color="#FF9900" size="1" align="left" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#E9E9E9">
    <td width="3%">No.</td>
    <td width="14%">ID-Jemaat</td>
    <td width="22%">Nama jemaat </td>
    <td width="22%">Jenis kelamin </td>
    <td width="23%">Tanggal Lahir </td>
    <td width="16%">Data detail 
    <?
	include_once("include/config.php");
	$wil=$_REQUEST['wil'];
	$pekerjaan=$_REQUEST['pekerjaan'];
	$kel= mysql_query("SELECT K.id_jemaat, K.jenispekerjaan, J.id_jemaat,J.nama_jemaat, J.jkel,J.tgl, J.bln, J.thn, J.ket FROM tbl_pekerjaan K, tbl_jemaat J 
	WHERE ( K.id_jemaat=J.id_jemaat AND J.ket=$wil AND K.jenispekerjaan='$pekerjaan') GROUP BY K.id_jemaat ORDER BY J.jkel ASC"); 
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
