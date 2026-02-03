<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>view data jemaat</title>
</head>

<body>
<b>Data Jemaat Berdasarkan Wilayah</b><hr color="#FF9900" size="1" width="98%" align="left" /><br>
<form name="formdata" method="post" action="<? $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> 
Nama <input type="text" name="nama">
<select name="wil">
<option value="0">semua wilayah </option>
<option value="01">Wilayah 1</option>
<option value="02">Wilayah 2</option>
<option value="03">Wilayah 3</option>
<option value="04">Wilayah 4</option>
<option value="05">Wilayah 5</option>
</select>&nbsp;&nbsp;<input type="submit" name="submit" value="cari">


<table width="98%" border="0" cellpadding="0" cellspacing="1">
  <tr bgcolor="#EAEAEA" align="center">
    <td width="136">ID Jemaat </td>
    <td width="209">Nama</td>
    <td width="124">Tanggal lahir </td>
    <td width="365">Alamat</td>
    <td width="163">No Telp. 
<?
require("include/config.php");
$hal = $_GET[hal];
if(!isset($_GET['hal'])){ $page = 1; 
} else {  $page = $_GET['hal']; }

$jmlperhalaman = 20;  // jumlah record per halaman
$offset = (($page * $jmlperhalaman) - $jmlperhalaman);  
// membaca data yang ditampilkan
$wilayah=$_REQUEST['wil'];
$sql = mysql_query("SELECT * FROM tbl_jemaat WHERE (ket like '$_REQUEST[wil]%'  AND nama_jemaat like '%$_REQUEST[nama]%') ORDER BY id_jemaat ASC LIMIT $offset, $jmlperhalaman ");
$banyaknya = mysql_query("SELECT * FROM tbl_jemaat WHERE (ket like '$_REQUEST[wil]%' AND nama_jemaat like '%$_REQUEST[nama]%')"); 
$jumlah = mysql_num_rows($banyaknya);
 
while($row = mysql_fetch_array($sql))
 {
 $id_jemaat = $row['id_jemaat'];$nama_jemaat = $row['nama_jemaat'];
 $alamat = $row['alamat'];$tgl = $row['tgl'];$bln = $row['bln'];$thn = $row['thn'];$no_hp = $row['no_hp'];
 $pasangan= $row['pasangan'];$orangtua = $row['nama_orangtua'];$ket = $row['ket']; ?></td>
  </tr>
  <tr>
    <td><? echo $id_jemaat; ?></td>
    <td><a href="?act=data_detail&id=<?= $id_jemaat?>&wil=<?= $ket; ?>"><? echo $nama_jemaat; ?></a></td>
    <td><?= $tgl?>-<?=$bln?>-<?=$thn; ?></td>
    <td><? echo $alamat; ?></td>
    <td><? echo $no_hp; ?></td>
  </tr><? } ?>
</table>

<div align="left">
<? echo "jumlah jemaat : $jumlah"; ?> |
<?php
// membuat nomor halaman
$total_record = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM tbl_jemaat WHERE (ket like '$_REQUEST[wil]%' AND nama_jemaat like '%$_REQUEST[nama]%')"),0);
$total_halaman = ceil($total_record / $jmlperhalaman);
$perhal=4;
if($hal > 1){ 
$prev = ($page - 1); 
echo "<a href=?act=datadetail&hal=$prev> kembali </a> "; 
}

if($total_halaman<=10){
$hal1=1;
$hal2=$total_halaman;
}else{
$hal1=$hal-$perhal;
$hal2=$hal+$perhal;
}

if($hal<=5){
$hal1=1;
}

if($hal<$total_halaman){
$hal2=$hal+$perhal;
}else{
$hal2=$hal;
}
for($i = $hal1; $i <= $hal2; $i++){ 
    if(($hal) == $i){ 
        echo "[<b>$i</b>] "; 
        } else { 
    if($i<=$total_halaman){
            echo "<a href=?act=datadetail&hal=$i>$i</a> "; 
    }
    } 
}
if($hal < $total_halaman){ 
    $next = ($page + 1); 
    echo "<a href=?act=datadetail&hal=$next> lanjutkan </a>"; 
}  
?></div>
</form>
</body>
</html>
