<?php
	include_once("../include/config.php");
	// untuk tambah gereja
	$tb_tambahgereja=$_POST['tambahgereja'];
	
	if ($tb_tambahgereja) { 
    $rs = mysql_query("INSERT INTO tbl_gereja(nama,alamat) values
    ('$_POST[nama]','$_POST[alamat]')");
    if(!$rs){ 
     die('{status:0,txt:"Data Tidak masuk"}'); 
    }
    if($rs){
      die('{status:1,txt:"Data masuk"}');}
    } 
?>
