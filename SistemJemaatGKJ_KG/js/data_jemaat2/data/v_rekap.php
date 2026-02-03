<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Rekap data jemaat ::</title>
</head>

<body>
<div align="center">
<h3>KARTU KELUARGA GEREJA KRISTEN JAWA KOTA GEDHE</h3><hr color="#666666" size="1" width="68%">
<?php
require("include/config.php");
$sql = mysql_query("SELECT * FROM tbl_jemaat WHERE id_jemaat='$_REQUEST[id]'"); 
while($row = mysql_fetch_array($sql)){
$id_jemaat = $row['id_jemaat'];$nama_jemaat = $row['nama_jemaat'];
$alamat=$row['alamat'];$tgl=$row['tgl'];$bln=$row['bln'];$thn=$row['thn'];$no_hp=$row['no_hp'];
$pasangan=$row['pasangan'];$orangtua=$row['nama_orangtua'];$ket=$row['ket'];$nokk=$row['nokk'];
echo "NO : $nokk /WIL $ket /";
$kode=substr($id_jemaat,0,5);
echo "$kode<br><br>";
?>
<div align="left">
NAMA KEPALA KELUARGA    : <?= $nama_jemaat; ?><BR>
ALAMAT RUMAH &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
<?= $row['alamat']; ?>
<BR>
NO.TELP / HP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<?= $row['telp']; ?> / <?= $row['no_hp']; ?>
<BR>
PEKERJAAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<? }?>
<BR>
<BR>

<table border="0" cellspacing="0" cellpadding="0" width="1000">
  <tr bgcolor="#EAEAEA" align="center">
    <td width="31" rowspan="2">No.</td>
    <td width="97" rowspan="2">Nama Lengkap </td>
    <td width="64" rowspan="2">Hub Kel </td>
    <td width="25" rowspan="2">L/P</td>
    <td colspan="2">Lahir</td>
    <td colspan="3">Babtis</td>
    <td colspan="3">Sidi</td>
    <td colspan="3">Menikah</td>
    </tr>
  <tr bgcolor="#EAEAEA" align="center">
    <td width="77">Tempat</td>
    <td width="89">Tgl</td>
    <td width="78">Tempat</td>
    <td width="73">Tgl</td>
    <td width="67">No.Surat</td>
    <td width="64">Tempat</td>
    <td width="64">Tgl</td>
    <td width="67">No.Surat</td>
    <td width="64">Tempat</td>
    <td width="64">Tgl</td>
    <td width="76">No.Surat

<?php
$sql = mysql_query("SELECT J.id_jemaat,J.nama_jemaat,J.ttl,J.tgl,J.bln,J.thn,J.jkel,J.anak,N.pasangan,N.gereja,N.tanggal,N.nosurat FROM tbl_jemaat J,tbl_pernikahan N WHERE (
J.id_jemaat='$_REQUEST[id]' AND J.id_jemaat=N.pasangan) GROUP BY J.id_jemaat ORDER BY J.thn "); 
$no=1;
while($row = mysql_fetch_array($sql)){
?></td>
  </tr>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= $nama_jemaat; ?></td>
    <td><?= $row['anak'];?></td>
    <td><?= $row['jkel']; ?></td>
    <td><?= $row['ttl']; ?></td>
    <td><?= $tgl; ?>-<?= $bln; ?>-<?= $thn; ?></td>
    <td>
	<? 
	$idjemaat=$row['id_jemaat'];
	$sqlb = mysql_query("SELECT id_jemaat,gerejababtis,tanggalbabtis,nosuratbabtis,gerejasidi,tanggalsidi 
	FROM tbl_babtis WHERE id_jemaat='$idjemaat'"); while($rows = mysql_fetch_array($sqlb)){?>
	<?= $row['gerejababtis']; ?></td>
    <td><?= $rows['tanggalbabtis']; ?></td>
    <td><?= $rows['nosuratbabtis']; ?></td>
    <td><?= $rows['gerejasidi']; ?></td>
    <td><?= $rows['tanggalsidi']; ?></td>
    <td><?= $rows['nosuratsidi']; }?>	</td>
    <td><?= $row['gereja']; ?></td>
    <td><?= $row['tanggal']; ?></td>
    <td><?= $row['nosurat']; ?>
      <? }?>

<?php
$sql = mysql_query("SELECT J.id_jemaat,J.nama_jemaat,J.ttl,J.tgl,J.bln,J.thn,J.jkel,J.pasangan,J.anak,N.pasangan,N.gereja,N.tanggal,N.nosurat FROM tbl_jemaat J,tbl_pernikahan N 
WHERE (J.pasangan='$_REQUEST[id]' AND J.pasangan=N.pasangan) GROUP BY J.id_jemaat ORDER BY J.thn"); 
$no=2;
while($row = mysql_fetch_array($sql)){
?></td>
  </tr>
  <tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_jemaat']; ?></td>
    <td><?= $row['anak'];?></td>
    <td><?= $row['jkel']; ?></td>
    <td><?= $row['ttl']; ?></td>
    <td><?= $row['tgl']; ?>-<?= $row['bln']; ?>-<?= $row['thn']; ?></td>
    <td><? 
	$idjemaat=$row['id_jemaat'];
	$sqlb = mysql_query("SELECT id_jemaat,gerejababtis,tanggalbabtis,nosuratbabtis,gerejasidi,tanggalsidi 
	FROM tbl_babtis WHERE id_jemaat='$idjemaat'"); while($rows = mysql_fetch_array($sqlb)){?>      <?= $row['gerejababtis']; ?></td>
    <td><?= $rows['tanggalbabtis']; ?></td>
    <td><?= $rows['nosuratbabtis']; ?></td>
    <td><?= $rows['gerejasidi']; ?></td>
    <td><?= $rows['tanggalsidi']; ?></td>
    <td><?= $rows['nosuratsidi']; } ?>	</td>
	
    <td><?= $row['gereja']; ?></td>
    <td><?= $row['tanggal']; ?></td>
    <td><?= $row['nosurat']; ?><? }?>
      <?php
$sql = mysql_query("SELECT id_jemaat,nama_orangtua,nama_jemaat,ttl,tgl,bln,thn,jkel,anak FROM tbl_jemaat
WHERE nama_orangtua='$_REQUEST[id]' AND (anak='anak' OR anak='orangtua' OR anak='keponakan' OR anak='cucu') GROUP BY id_jemaat ORDER BY thn"); 
$no=3;
while($row = mysql_fetch_array($sql)){
?></td>
  </tr>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama_jemaat']; ?></td>
    <td><?= $row['anak'];?></td>
    <td><?= $row['jkel']; ?></td>
    <td><?= $row['ttl']; ?></td>
    <td><?= $row['tgl']; ?>-<?= $row['bln']; ?>-<?= $row['thn']; ?></td>
    <td><? 
	$idjemaat=$row['id_jemaat'];
	$sqlb = mysql_query("SELECT id_jemaat,gerejababtis,tanggalbabtis,nosuratbabtis,gerejasidi,tanggalsidi,nosuratsidi
	FROM tbl_babtis WHERE id_jemaat='$idjemaat'"); 
	while($rows = mysql_fetch_array($sqlb)){?>
	<?= $rows['gerejababtis']; ?></td>
    <td><?= $rows['tanggalbabtis']; ?></td>
    <td><?= $rows['nosuratbabtis']; ?></td>
    <td><?= $rows['gerejasidi']; ?></td>
    <td><?= $rows['tanggalsidi']; ?></td>
    <td><?= $rows['nosuratsidi'];} ?></td>
	
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><? }?></td>
  </tr>
</table>
</div>
<div align="left">
<H3><b><u>Usaha Keluarga :</u></b></H3>
<? $sql = mysql_query("SELECT * FROM tbl_usaha WHERE id_pasangan='$_REQUEST[id]'"); 
while($row = mysql_fetch_array($sql)){
echo $row['usaha'];}
?></div></div>
</body>
</html>
