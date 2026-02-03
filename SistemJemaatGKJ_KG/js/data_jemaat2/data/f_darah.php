<?  
$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket=$wil AND goldarah='$gdarah'"); 
$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket=$wil AND goldarah='$gdarah'");
?>
	