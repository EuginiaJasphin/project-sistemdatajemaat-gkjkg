<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: kelompok usia ::</title>
</head>

<body>
<div align="center">DATA JEMAAT BERDASAR STATUS BABTIS <br>
  Status Babtis :<?= $_REQUEST['status']; ?><br>
Wilayah : <?= $_REQUEST['wil']; ?></div><hr color="#FF9900" size="1" align="left" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#E9E9E9">
    <td width="3%">No</td>
    <td width="14%">ID-Jemaat</td>
    <td width="22%">Nama jemaat </td>
    <td width="22%">Jenis kelamin </td>
    <td width="23%">Tanggal Lahir </td>
    <td width="16%">Data detail 
    <?
	include_once("include/config.php");
	$wil=$_REQUEST['wil'];
    $status=$_REQUEST['status'];
	if ($status=='Baptis'){
	$kosong="!=''";$min="!='-'";
	$kel_baptis= mysql_query("SELECT B.id_jemaat, B.tanggalbabtis,J.id_jemaat,J.nama_jemaat,J.jkel,J.tgl, J.bln, J.thn,J.ket 
	FROM tbl_babtis B, tbl_jemaat J
	WHERE B.id_jemaat=J.id_jemaat AND B.tanggalbabtis$kosong AND B.tanggalbabtis$min AND J.ket=$wil 
	GROUP BY B.id_jemaat ORDER BY J.jkel ASC"); 
	$no=1;
    while($data= mysql_fetch_array($kel_baptis))
    {echo "</td></tr><tr><td>";
     echo $no++; echo "</td><td>";
	 echo $data['id_jemaat']; echo "</td><td>";
	 echo $data['nama_jemaat'];echo "</td><td>";
	 echo $data['jkel'];echo "</td><td>";
	 echo $data['tgl'];echo"/"; echo $data['bln'];echo "/"; echo $data['thn']; echo "</td><td><a href=?act=data_detail&wil=";
	 echo $_REQUEST['wil'];echo "&id="; 
	 echo $data['id_jemaat'];echo ">detail</a>"; }}

	elseif ($status=='Belum Baptis'){
	$kosong="!=''";$min="!='-'";
	$b_baptis=mysql_query("SELECT id_jemaat,nama_jemaat, jkel,ket,ttl,tgl,bln,thn FROM tbl_jemaat WHERE	ket=$wil 
	ORDER BY jkel");
	$no=1;
    while($data= mysql_fetch_array($b_baptis))
    {echo "</td></tr><tr><td>";
     echo $no++; echo "</td><td>";
	 $jemaat=$data['id_jemaat'];
	 $blm_babtis=mysql_query("SELECT id_jemaat,tanggalbabtis FROM tbl_babtis WHERE id_jemaat='$jemaat' 
	 AND tanggalbabtis$kosong AND tanggalbabtis$min");
	 $j_blmbabtis=mysql_num_rows($blm_babtis);
	 if ($j_blmbabtis!=0){
	 echo "<span class='merah'>sudah dibabtis</span>"; }
	 else {
	 echo "<b>$data[id_jemaat]</b>";
	 }	
	 echo "</td><td>";
	 echo $data['nama_jemaat'];echo "</td><td>";
	 echo $data['jkel'];echo "</td><td>";
	 echo $data['tgl'];echo"/"; echo $data['bln'];echo "/"; echo $data['thn']; echo "</td><td><a href=?act=data_detail&wil=";
	 echo $_REQUEST['wil'];echo "&id="; 
	 echo $data['id_jemaat'];echo ">detail</a>"; }}
	?>
	 </td>
  </tr>
</table>
</body>
</html>
