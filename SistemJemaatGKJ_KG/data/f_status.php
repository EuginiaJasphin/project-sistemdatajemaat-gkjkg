<?
	$b_laki= mysql_query("SELECT id_jemaat,status,jkel,ket FROM tbl_jemaat 
	WHERE status='$status' AND jkel='$cowok' AND ket=$wil"); 
	$b_perempuan= mysql_query("SELECT id_jemaat,status,jkel,ket FROM tbl_jemaat 
	WHERE status='$status' AND jkel='$cewek' AND ket=$wil");
	
	$bj_laki= mysql_query("SELECT id_jemaat,status,jkel,ket FROM tbl_jemaat 
	WHERE status='$status' AND jkel='$cowok'"); 
	$bj_perempuan= mysql_query("SELECT id_jemaat,status,jkel,ket FROM tbl_jemaat 
	WHERE status='$status' AND jkel='$cewek'");
	
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);

    $jb_laki= mysql_num_rows($bj_laki);
	$jb_perempuan= mysql_num_rows($bj_perempuan);
	
	$j_jml=$j_laki+$j_perempuan; 
	$jb_jml=$jb_laki+$jb_perempuan; 
?>