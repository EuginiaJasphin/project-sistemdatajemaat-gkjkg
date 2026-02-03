<?php 
include_once("../include/config.php");
$action="add_gereja";
	$judul="Data Gereja ";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_gereja where id_gereja='$_GET[id]'";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$recor=mysql_num_rows($res);
		$id_gereja=$data['id_gereja'];
		$nama=$data['nama'];
		$alamat=$data['alamat'];
		$action="update_gereja";
		$readonly="readonly=readonly";
		$status="Update";
		$judul="Update Data Gereja";
	}
?>
<form method="post" name="formgereja" action="proses_data.php" id="formgereja">
<table width="848">
<tr><th colspan="2"><b><?php echo $judul; ?></b></th></tr>
<tr>
  <td width="177">Nama Gereja </td>
  <td><input type="text" name="nama" id="nama" value="<?= $nama;?>" /><input type="hidden" name="id_asli" value="<?= $id_gereja ?>" /></td>
</tr>
<tr>
  <td>Alamat Gereja </td>
  <td>
  <textarea name="alamat" rows="5" cols="60"> <?= $alamat;?></textarea></td>
</tr>

<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr><td colspan="2"><input type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data&status=gereja"><input type="reset" name="reset" value="Tambah baru" /></a>
<? if($_GET['action']=='update') {?>| <a href="proses_data.php?action=del_gereja&id_gereja=<?php echo $id_gereja;?>" class="delete"><input type="reset" name="reset" value="Delete Data" /></a> <? } ?></td></tr>
</table>
<input type="hidden" name="action" value="<?php echo $action; ?>" />
</form>
<br />
<form action="<? $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">Nama Gereja : 
<input type="text" name="nama" size="20" />
<input type="submit" name="submit" value="cari" />
<?php
include_once("../include/config.php");
include_once("pagination_class.php");

if ($_REQUEST['nama']!=''){
$sql =mysql_query("SELECT * FROM tbl_gereja WHERE nama LIKE '%$_REQUEST[nama]%' ORDER BY id_gereja DESC "); 
?><table id="tblgereja" width="860"><tr>
  <th width="95">Id Gereja</th>
  <th width="307">Nama Gereja</th>
  <th width="316">Alamat</th>
  <th width="122">Aksi</th>
</tr>
  <?   while($r= mysql_fetch_array($sql)){ ?>
       <tr><td><?= $r['id_gereja']; ?></td>
         <td><?= $r['nama']; ?></td>
         <td><?= $r['alamat']; ?></td>
         <td><a href="?adm=in_data&status=gereja&action=update&id=<?= $r['id_gereja']; ?>">Update Data</a></td>
       </tr>
	   	<?php } //end while ?>
	    <tr id="total"><td colspan="4"><?php echo $total; ?></td></tr>
</table>
<? } else {
// memanfaatkan class pagination dari Reneesh T.K
$hal = $_GET[h];
if(!isset($_GET['h'])){ 
$page = 1; 
} else { 

$page = $_GET['h']; 
}
$jmlperhalaman = 8;  // jumlah record per halaman
$offset = (($page * $jmlperhalaman) - $jmlperhalaman); 
$sql =mysql_query("SELECT * FROM tbl_gereja ORDER BY id_gereja DESC LIMIT $offset, $jmlperhalaman"); 
?><table id="tblgereja" width="860"><tr>
  <th width="95">Id Gereja</th>
  <th width="307">Nama Gereja</th>
  <th width="316">Alamat</th>
  <th width="122">Aksi</th>
</tr>
  <?   while($r= mysql_fetch_array($sql)){ ?>
       <tr><td><?= $r['id_gereja']; ?></td>
         <td><?= $r['nama']; ?></td>
         <td><?= $r['alamat']; ?></td>
         <td><a href="?adm=in_data&status=gereja&action=update&id=<?= $r['id_gereja']; ?>">Update Data</a></td>
       </tr>
	   	<?php } //end while ?>
		<tr id="nav"><td colspan="4">
<?

// membuat nomor halaman
$total_record = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM tbl_gereja ORDER BY id_gereja DESC"),0);
$total_halaman = ceil($total_record / $jmlperhalaman);
echo "<span class='content2'>"; 
$perhal=4;
if($hal > 1){ $prev = ($page - 1); 
   echo "<a href=?adm=in_data&status=gereja&h=$prev> <<</a> &nbsp;&nbsp;|  "; 
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
    echo "<a href=?adm=in_data&status=gereja&h=$i>$i</a> "; 
    }
    } 
}
if($hal < $total_halaman){ 
    $next = ($page + 1); 
    echo " |&nbsp;&nbsp; <a href=?adm=in_data&status=gereja&h=$next>>> </a>"; 
} 
echo "</span>"; 
?>
		</td>
		</tr>
	    <tr id="total"><td colspan="4"><?php echo $total; ?></td></tr>
</table><? }?>
</form>