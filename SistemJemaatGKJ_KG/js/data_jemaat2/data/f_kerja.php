<?
	$b_laki= mysql_query("SELECT K.id_jemaat, K.jenispekerjaan, J.id_jemaat, J.jkel, J.ket FROM tbl_pekerjaan K, tbl_jemaat J 
	WHERE ( K.id_jemaat=J.id_jemaat AND J.ket=$wil AND J.jkel='$cowok' AND K.jenispekerjaan='$pekerjaan') GROUP BY K.id_jemaat"); 
	$b_perempuan= mysql_query("SELECT K.id_jemaat, K.jenispekerjaan, J.id_jemaat, J.jkel, J.ket FROM tbl_pekerjaan K, tbl_jemaat J 
	WHERE ( K.id_jemaat=J.id_jemaat AND J.ket=$wil AND J.jkel='$cewek' AND K.jenispekerjaan='$pekerjaan') GROUP BY K.id_jemaat");
	
	$bj_laki= mysql_query("SELECT K.id_jemaat, K.jenispekerjaan, J.id_jemaat, J.jkel, J.ket FROM tbl_pekerjaan K, tbl_jemaat J 
	WHERE ( K.id_jemaat=J.id_jemaat AND K.jenispekerjaan='$pekerjaan' AND J.jkel='$cowok') GROUP BY K.id_jemaat"); 
	$bj_perempuan= mysql_query("SELECT K.id_jemaat, K.jenispekerjaan, J.id_jemaat, J.jkel, J.ket 
	FROM tbl_pekerjaan K, tbl_jemaat J WHERE ( K.id_jemaat=J.id_jemaat AND K.jenispekerjaan='$pekerjaan') AND J.jkel='$cewek' GROUP BY K.id_jemaat");
	
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	
	$jb_laki= mysql_num_rows($bj_laki);
	$jb_perempuan= mysql_num_rows($bj_perempuan);
	
	$j_jml=$j_laki+$j_perempuan; 
	$jb_jml=$jb_laki+$jb_perempuan;
?>