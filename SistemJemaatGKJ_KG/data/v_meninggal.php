<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>view data ulang tahun jemaat</title>
</head>

<body>
<b>Data Jemaat Meninggal Bulan ini ( <? $blnn=date('m');
switch ($blnn){
case 01: $terbilang = "Januari"; break;case 02: $terbilang = "Februari"; break;
case 03: $terbilang = "Maret"; break;case 04: $terbilang = "April"; break;
case 05: $terbilang = "Mei"; break;case 06: $terbilang = "Juni"; break;
case 07: $terbilang = "Juli"; break;case 08: $terbilang = "Agustus"; break;
case 09: $terbilang = "September"; break;case 10: $terbilang = "Oktober"; break;
case 11: $terbilang = "November"; break;case 12: $terbilang = "Desember"; break;} 
echo $terbilang;
?> ) :</b>
<hr color="#FF9900" size="1" width="98%" align="left" />
<table width="98%" border="0" cellpadding="0" cellspacing="1">
  <tr bgcolor="#EAEAEA" align="center">
    <td width="118">ID Jemaat </td>
    <td width="143">Tanggal Lahir </td>
    <td width="192">Nama</td>
    <td width="297">Sebab Meninggal </td>
    <td width="105">Wilayah</td>
    <td width="124">No Telp. 
<?
require("include/config.php");
// membaca data yang ditampilkan
$bulan=date('m');$tahun=date('Y');
$sql=mysql_query("SELECT J.id_jemaat,J.nama_jemaat,J.tgl,J.bln,J.thn,J.alamat,J.ket,J.no_hp,M.id_jemaat,M.tgl,M.bln,M.thn,M.sebab 
FROM tbl_jemaat J, tbl_meninggal M WHERE (J.id_jemaat=M.id_jemaat AND M.bln=$bulan AND M.thn=$tahun) GROUP BY J.id_jemaat ORDER BY J.nama_jemaat");
while($row=mysql_fetch_array($sql))
 {
 $id_jemaat = $row['id_jemaat'];$nama_jemaat = $row['nama_jemaat'];
 $sebab = $row['sebab'];$tggl = $row['tgl'];$blnn = $row['bln'];$thnn = $row['thn'];$no_hp = $row['no_hp'];$ket = $row['ket']; ?></td>
  </tr>
  <tr>
    <td><? echo $id_jemaat; ?></td>
    <td><?= $tggl?>-<?=$blnn?>-<?=$thnn; ?></td>
    <td><a href="?act=datarekap&id=<?
	if(($row['jkel']=='P') && ($row['pernikahan']=='menikah')) { echo $pasangan; }
	else if ($row['pernikahan']=='') { echo $orangtua; }
	else { echo $id_jemaat; }
	?>"><? echo $nama_jemaat; ?></a></td>
    <td><? echo $sebab; ?></td>
    <td><? echo $ket; ?></td>
    <td><? echo $no_hp; ?></td>
  </tr><? } ?>
</table>
</body>
</html>
