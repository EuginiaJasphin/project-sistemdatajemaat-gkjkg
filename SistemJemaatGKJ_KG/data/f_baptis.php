<?
	$b_laki= mysql_query("SELECT B.id_jemaat, B.tanggalbabtis, B.tanggalsidi,J.id_jemaat,J.jkel,J.ket 
	FROM tbl_babtis B, tbl_jemaat J WHERE B.id_jemaat=J.id_jemaat AND J.jkel='$cowok' AND B.tanggalbabtis$kosong 
	AND B.tanggalbabtis$min AND J.ket=$wil GROUP BY B.id_jemaat"); 
	$b_perempuan= mysql_query("SELECT B.id_jemaat, B.tanggalbabtis, B.tanggalsidi,J.id_jemaat,J.jkel,J.ket 
	FROM tbl_babtis B, tbl_jemaat J WHERE B.id_jemaat=J.id_jemaat 
	AND J.jkel='$cewek' AND B.tanggalbabtis$kosong AND B.tanggalbabtis$min AND J.ket=$wil GROUP BY B.id_jemaat");
	
	$bj_laki= mysql_query("SELECT B.id_jemaat, B.tanggalbabtis, B.tanggalsidi,J.id_jemaat,J.jkel,J.ket 
	FROM tbl_babtis B, tbl_jemaat J WHERE B.id_jemaat=J.id_jemaat AND J.jkel='$cowok' AND B.tanggalbabtis$kosong 
	AND B.tanggalbabtis$min GROUP BY B.id_jemaat"); 
	$bj_perempuan= mysql_query("SELECT B.id_jemaat, B.tanggalbabtis, B.tanggalsidi,J.id_jemaat,J.jkel,J.ket 
	FROM tbl_babtis B, tbl_jemaat J WHERE B.id_jemaat=J.id_jemaat 
	AND J.jkel='$cewek' AND B.tanggalbabtis$kosong AND B.tanggalbabtis$min GROUP BY B.id_jemaat");	
	
	// rr wer
	
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	//dfdff
	$jb_laki= mysql_num_rows($bj_laki);
	$jb_perempuan= mysql_num_rows($bj_perempuan);
	// fasfsaf
	$ababtis=mysql_query("SELECT id_jemaat,jkel,ket FROM tbl_jemaat WHERE  jkel='$cowok' AND ket=$wil ORDER BY id_jemaat");
	$j_ababtis=mysql_num_rows($ababtis);
	$ababtisp=mysql_query("SELECT id_jemaat,jkel,ket FROM tbl_jemaat WHERE  jkel='$cewek' AND ket=$wil ORDER BY id_jemaat");
	$j_ababtisp=mysql_num_rows($ababtisp);

	
	$j_jml=$j_laki+$j_perempuan;
	$jb_jml=$jb_laki+$jb_perempuan;
	
	$j_jmlh=$j_bbaptis+$j_bbaptisp;

?>