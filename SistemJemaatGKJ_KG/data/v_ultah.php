<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>view data ulang tahun jemaat</title>
</head>

<body>
<b>Data Jemaat Yang Ulang Tahun Hari ini :</b>
<hr color="#FF9900" size="1" width="98%" align="left" />
<table width="98%" border="0" cellpadding="0" cellspacing="1">
  <tr bgcolor="#EAEAEA" align="center">
    <td width="118">ID Jemaat </td>
    <td width="143">Tanggal Lahir </td>
    <td width="192">Nama</td>
    <td width="297">Alamat</td>
    <td width="105">Wilayah</td>
    <td width="124">No Telp. 
<?
require("include/config.php");
// membaca data yang ditampilkan
$tgl=date('d');
$bln =date('m');
$sql = mysql_query("SELECT * FROM tbl_jemaat WHERE tgl='$tgl' AND bln='$bln' ORDER BY id_jemaat ASC"); 
$banyaknya = mysql_query("SELECT * FROM tbl_jemaat WHERE tgl='$tgl' AND bln='$bln'"); 
$jumlah = mysql_num_rows($banyaknya);
 
while($row = mysql_fetch_array($sql))
 {
 $id_jemaat = $row['id_jemaat'];$nama_jemaat = $row['nama_jemaat'];
 $alamat = $row['alamat'];$tggl = $row['tgl'];$blnn = $row['bln'];$thnn = $row['thn'];$no_hp = $row['no_hp'];$ket = $row['ket']; ?></td>
  </tr>
  <tr>
    <td><? echo $id_jemaat; ?></td>
    <td><?= $tggl?>-<?=$blnn?>-<?=$thnn; ?></td>
    <td><a href="?act=data_detail&id=<?= $id_jemaat; ?>&wil=<?= $ket ?>"><? echo $nama_jemaat; ?></a></td>
    <td><? echo $alamat; ?></td>
    <td><? echo $ket; ?></td>
    <td><? echo $no_hp; ?></td>
  </tr><? } ?>
</table>
<br><br>
<b>Cari Ulang Tahun Jemaat :</b>
<hr color="#FF9900" size="1" width="98%" align="left" />
<form name="formultah" method="post" action="<? $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> 
Pilih : 
<select name="tanggal">
      <option>tgl</option>
	  <option value="01">01</option>
	  <option value="02">02</option>
	  <option value="03">03</option>
	  <option value="04">04</option>
	  <option value="05">05</option>
	  <option value="06">06</option>
	  <option value="07">07</option>
	  <option value="08">08</option>
	  <option value="09">09</option>
      <?php for ($i=10; $i <= 31; $i++) {
      if ($i == $outdate){ $selectdate ="selected";} else {$selectdate="";
      }echo ("<option value=\"$i\" $selectdate>$i</option>"."\n");}
      ?>
  </select>
/
<select name="bulan">
  <option value="bln">bln</option>
  <option value="01">Januari</option>
  <option value="02">Februari</option>
  <option value="03">Maret</option>
  <option value="04">April</option>
  <option value="05">Mei</option>
  <option value="06">Juni</option>
  <option value="07">Juli</option>
  <option value="08">Agustus</option>
  <option value="09">September</option>
  <option value="10">Oktober</option>
  <option value="11">November</option>
  <option value="12">Desember</option>
</select>
&nbsp;&nbsp;
<input type="submit" name="submit" value="cari">
<table width="98%" border="0" cellpadding="0" cellspacing="1">
  <tr bgcolor="#EAEAEA" align="center">
    <td width="125">ID Jemaat </td>
    <td width="141">Tanggal Lahir </td>
    <td width="191">Nama</td>
    <td width="293">Alamat</td>
    <td width="105">Wilayah</td>
    <td width="124">No Telp.
<?
require("include/config.php");
$hal = $_GET[hal];
if(!isset($_GET['hal'])){ $page = 1; 
} else {  $page = $_GET['hal']; }

$jmlperhalaman = 20;  // jumlah record per halaman
$offset = (($page * $jmlperhalaman) - $jmlperhalaman);  
// membaca data yang ditampilkan
$tanggal=$_REQUEST['tanggal'];
$bulan =$_REQUEST['bulan'];
$sql= mysql_query("SELECT * FROM tbl_jemaat WHERE tgl='$tanggal' AND bln='$bulan' ORDER BY id_jemaat ASC LIMIT $offset, $jmlperhalaman"); 
$banyaknya = mysql_query("SELECT * FROM tbl_jemaat WHERE tgl='$tanggal' AND bln='$bulan'"); 
$jumlah = mysql_num_rows($banyaknya);
 
while($row = mysql_fetch_array($sql))
 {
 $id_jemaat = $row['id_jemaat'];$nama_jemaat = $row['nama_jemaat'];
 $alamat = $row['alamat'];$tgl = $row['tgl'];$bln = $row['bln'];$thn = $row['thn'];$no_hp = $row['no_hp'];$ket = $row['ket']; ?></td>
  </tr>
  <tr>
    <td><? echo $id_jemaat; ?></td>
    <td><?= $tgl?>-<?=$bln?>-<?=$thn; ?></td>
    <td><a href="?act=data_detail&id=<?= $id_jemaat; ?>&wil=<?= $ket ?>"><? echo $nama_jemaat; ?></a></td>
    <td><? echo $alamat; ?></td>
    <td><? echo $ket; ?></td>
    <td><? echo $no_hp; ?></td>
  </tr>
  <? } ?>
</table>
<div align="left">
<? echo "jumlah jemaat : $jumlah"; ?> |
<?php
// membuat nomor halaman
$total_record = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM tbl_jemaat WHERE tgl='$tanggal' AND bln='$bulan'"),0);
$total_halaman = ceil($total_record / $jmlperhalaman);
$perhal=4;
if($hal > 1){ 
$prev = ($page - 1); 
echo "<a href=?act=cont&hal=$prev> kembali </a> "; 
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
            echo "<a href=?act=cont&hal=$i>$i</a> "; 
    }
    } 
}
if($hal < $total_halaman){ 
    $next = ($page + 1); 
    echo "<a href=?act=cont&hal=$next> lanjutkan </a>"; 
}  
?></div>
</form>
</body>
</html>
