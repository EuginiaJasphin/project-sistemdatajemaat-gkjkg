<?php
// nama file
$namaFile = "Export_Data_Jemaat_GKJ_Kotagede";
// Function untuk menulis data (text) ke cell excel
function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}
// header file excel
header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/x-msdownload");
header("Content-Type: application/vnd.ms-excel");

// header untuk nama file
header("Content-Disposition: attachment;filename=".$namaFile.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<html>
<head><title>:: EXPORT DATA JEMAAT ::</title>
</head>
<body>
<br /> 
Export Data Jemaat GKJ-Kotagede
<br />
<br />
<table width="2630" border="0" cellpadding="0" cellspacing="0" class="content2">
  <tr bgcolor="#CCCCCC">
    <td width="22">No</td>
    <td width="69">Id_Jemaat</td>
    <td width="40">Nama</td>
    <td width="66">Nama Panggilan </td>
  
    <td width="29">TTL</td>
    <td width="31">Tgl lahir </td>
    <td width="24">jkel</td>
    <td width="41">gol darah </td>
    <td width="47">alamat</td>
    <td width="58">kelurahan</td>
    <td width="71">kecamatan</td>
    <td width="29">kota</td>
    <td width="51">provinsi</td>
    <td width="26">no HP </td>
    <td width="29">Telp</td>
    <td width="36">Email</td>
    <td width="77">Status Pernikahan </td>
    <td width="46">Hobby</td>
    <td width="27">Wil.</td>
    <td width="71">Hubungan Keluarga </td>
    <td width="77">Jenjang Pendidikan </td>
    <td width="58">Nama Sekolah </td>
    <td width="39">Thn Lulus </td>
    <td width="50">Tempat</td>
    <td width="36">Gelar</td>
    <td width="53">Pend Khusus </td>
    <td width="71">Jenis Pekerjaan </td>
    <td width="54">Tempat Kerja </td>
    <td width="51">Alamat Kerja </td>
    <td width="50">Jabatan</td>
    <td width="77">Tanggal Pernikahan </td>
    <td width="77">Gereja Pernikahan </td>
    <td width="53">Pendeta</td>
    <td width="55">Catatan Sipil </td>
    <td width="35">No. Surat</td>
    <td width="49">Gereja Babtis </td>
    <td width="46">Tgl Babtis </td>
    <td width="65">No.Surat Babtis </td>
    <td width="58">Pendeta Babtis </td>
    <td width="57">Gereja Atestasi </td>
    <td width="57">Tgl. Atestasi </td>
    <td width="35">No. Surat</td>
    <td width="49">Gereja Sidi </td>
    <td width="25">Tgl Sidi </td>
    <td width="58">Pendeta Sidi </td>
    <td width="39">No. Surat Sidi </td>
    <td width="81">Gereja Penyerahan </td>
    <td width="81">Tgl Penyerahan </td>
    <td width="104">Pendeta Penyerahan </td>
    <?php 
      include'../include/config.php';

      $sql = mysql_query("SELECT * FROM tbl_jemaat ORDER BY id_jemaat ASC"); 
	  $no=1;
      while($data=mysql_fetch_array($sql)){
	  $id_jemaat=$data['id_jemaat'];?>
  </tr>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['id_jemaat'];?></td>
    <td><?php echo $data['nama_jemaat'];?></td>
    <td><?php echo $data['nama_panggilan'];?></td>
    <td><?php echo $data['ttl'];?></td>
    <td><?php echo $data['tgl'];echo "/"; echo $data['bln'];echo "/";echo $data['thn'];?></td>
    <td><?php echo $data['jkel'];?></td>
    <td><?php echo $data['goldarah'];?></td>
    <td><?php echo $data['alamat'];?></td>
    <td><?php echo $data['kelurahan'];?></td>
    <td><?php echo $data['kecamatan'];?></td>
    <td><?php echo $data['kota'];?></td>
    <td><?php echo $data['provinsi'];?></td>
    <td><?php echo $data['no_hp'];?></td>
    <td><?php echo $data['telp'];?></td>
    <td><?php echo $data['email'];?></td>
    <td><?php echo $data['pernikahan'];?></td>
    <td><?php echo $data['hobby'];?></td>
    <td><?php echo $data['ket'];?></td>
    <td><?php echo $data['anak'];?></td>
    <td><?php 
	$sqll = mysql_query("SELECT * FROM tbl_pendidikan WHERE id_jemaat='$id_jemaat' LIMIT 0,1");
	$jumtblpendidikan = mysql_num_rows($sqll);
	 
	  if ($jumtblpendidikan!='') {
    while($dataa=mysql_fetch_array($sqll)){
	$jenjangpend=$dataa['jenjangpend'];
	$namasekolah=$dataa['namasekolah'];
	$thnlulus=$dataa['thnlulus'];
	$tempat=$dataa['tempat'];
	$gelar=$dataa['gelar'];
	$pendkhusu=$dataa['pendkhusus']; }
	} else {
	$jenjangpend='';
	$namasekolah='';
	$thnlulus='';
	$tempat='';
	$gelar='';
	$pendkhusu='';
	}
	echo $jenjangpend;?></td>
    <td><?php 	
	echo $namasekolah;?></td>
    <td><?php echo $thnlulus;?></td>
    <td><?php echo $tempat;?></td>
    <td><?php echo $gelar;?></td>
    <td><?php echo $pendkhusus; ?></td>
    <td><?php 
	$sqlll = mysql_query("SELECT * FROM tbl_pekerjaan WHERE id_jemaat='$id_jemaat' LIMIT 0,1");
	$jumtblpekerjaan = mysql_num_rows($sqlll); 
	  if ($jumtblpekerjaan!='') { 
    while($dataaa=mysql_fetch_array($sqlll)){
	$jenispekerjaan=$dataaa['jenispekerjaan'];
	$tempatkerja=$dataaa['tempatkerja'];
	$alamatkerja=$dataaa['alamatkerja'];
	$jabatan=$dataaa['jabatan']; }
	} else {
	$jenispekerjaan='';
	$tempatkerja='';
	$alamatkerja='';
	$jabatan=''; 
	}
	echo $jenispekerjaan; ?></td>
    <td><?php echo $tempatkerja;?></td>
    <td><?php echo $alamatkerja?></td>
    <td><?php echo $jabatan; ?></td>
    <td><?php 
	$sqllll = mysql_query("SELECT * FROM tbl_pernikahan WHERE pasangan='$id_jemaat' LIMIT 0,1"); 
	$jumtblpernikahan = mysql_num_rows($sqlll); 
	  if ($jumtblpernikahan!='') { 
    while($dataaaa=mysql_fetch_array($sqllll)){
	$tanggalnikah=$dataaaa['tanggal'];
	$gerejanikah=$dataaaa['gereja'];
	$pendetanikah=$dataaaa['pendeta'];
	$catatansipil=$dataaaa['catatansipil'];
	$nosuratnikah=$dataaaa['nosurat']; }
	} else {
	$tanggalnikah='';
	$gerejanikah='999';
	$pendetanikah='';
	$catatansipil='';
	$nosuratnikah='';
	}
	echo $tanggalnikah ; ?></td>
    <td>
	<?php 
	$sq1 = mysql_query("SELECT * FROM tbl_gereja WHERE id_gereja='$gerejanikah' LIMIT 0,1"); 
    while($da1=mysql_fetch_array($sq1)){ echo $da1['nama']; }
	?></td>
    <td><?php echo $pendetanikah; ?></td>
    <td><?php echo $catatansipil; ?></td>
    <td><?php echo $nosuratnikah;?></td>
    <td><?php 
	$sqlllll = mysql_query("SELECT * FROM tbl_babtis WHERE id_jemaat='$id_jemaat' LIMIT 0,1");
	$jumtblpbabtis = mysql_num_rows($sqlll); 
	  if ($jumtblpbabtis!='') { 
    while($dataaaaa=mysql_fetch_array($sqlllll)){
	$gerejababtis=$dataaaaa['gerejababtis'];
	$tanggalbabtis=$dataaaaa['tanggalbabtis'];
	$nosuratbabtis=$dataaaaa['nosuratbabtis'];
	$pendetababtis=$dataaaaa['pendetababtis'];
	$gerejatestasi=$dataaaaa['gerejastetasi'];
	$tanggalatestasi=$dataaaaa['tanggalatestasi'];
	$nosuratatestasi=$dataaaaa['nosurat'];
	$gerejasidi=$dataaaaa['gerejasidi'];
	$tanggalsidi=$dataaaaa['tanggalsidi'];
	$pendetasidi=$dataaaaa['pendetasidi'];
	$nosuratsidi=$dataaaaa['nosuratsidi'];
	$gerejapenyerahan=$dataaaaa['gerejapenyerahan'];
	$tanggalpenyerahan=$$dataaaaa['tanggalpenyerahan'];
	$pendetapenyerahan=$dataaaaa['pendetapenyerahan']; }
	} else {
	$gerejababtis='999';
	$tanggalbabtis='';
	$nosuratbabtis='';
	$pendetababtis='';
	$gerejatestasi='999';
	$tanggalatestasi='';
	$nosuratatestasi='';
	$gerejasidi='999';
	$tanggalsidi='';
	$pendetasidi='';
	$nosuratsidi='';
	$gerejapenyerahan='999';
	$tanggalpenyerahan='';
	$pendetapenyerahan='';
	}

	$sq2 = mysql_query("SELECT * FROM tbl_gereja WHERE id_gereja='$gerejababtis' LIMIT 0,1"); 
    while($da2=mysql_fetch_array($sq2)){ echo $da2['nama']; }
	?></td>
    <td><?php echo $tanggalbabtis;?></td>
    <td><?php echo $nosuratbabtis;?></td>
    <td><?php echo $pendetababtis;?></td>
    <td>
	<?php 
	$sq3 = mysql_query("SELECT * FROM tbl_gereja WHERE id_gereja='$gerejatestasi' LIMIT 0,1"); 
    while($da3=mysql_fetch_array($sq3)){ echo $da3['nama']; }?></td>
    <td><?php echo $tanggalatestasi;?></td>
    <td><?php echo $nosuratatestas;?></td>
    <td><?php 
	$sq4 = mysql_query("SELECT * FROM tbl_gereja WHERE id_gereja='$gerejasidi' LIMIT 0,1"); 
    while($da4=mysql_fetch_array($sq4)){ echo $da4['nama']; }
	?></td>
    <td><?php echo $tanggalsidi;?></td>
    <td><?php echo $pendetasidi;?></td>
    <td><?php echo $nosuratsidi;?></td>
    <td><?php
	$sq5 = mysql_query("SELECT * FROM tbl_gereja WHERE id_gereja='$gerejapenyerahan' LIMIT 0,1"); 
    while($da5=mysql_fetch_array($sq5)){ echo $da5['nama']; }
	?>
    </td>
    <td><?php echo $tanggalpenyerahan;?></td>
    <td><?php echo $pendetapenyerahan;?></td>
    <?php } ?>
  </tr>
</table>
<br />
</body>
</html>