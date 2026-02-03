<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>agregat jemaat berdasarkan usia</title>
</head>
<body>
<b>Data Jemaat Berdasar Kelompok Usia:</b>
<hr color="#FF9900" size="1" width="98%" align="left" />
<div align="right"><a href="javascript:void(printSpecial())"><img src="images/icon-print.jpg" border="0">&nbsp;Print</a>&nbsp;&nbsp;</div>
<? require("include/config.php"); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#E9E9E9">
    <td width="179" rowspan="2" bgcolor="#E9E9E9">Wilayah</td>
    <td colspan="4">PAUD/ TK </td>
    <td colspan="4">Anak-anak(SD)</td>
    <td colspan="4">Remaja</td>
    <td colspan="4">Pemuda</td>
    <td colspan="4">Dewasa</td>
    <td colspan="4">Lansia</td>
  </tr>
  
  <tr bgcolor="#E9E9E9">
    <td width="4%">L</td>
    <td width="4%">P</td>
    <td width="4%">Jumlah</td>
    <td width="4%">&nbsp;</td>
    <td width="4%">L</td>
    <td width="3%">P</td>
    <td width="4%">Jumlah</td>
    <td width="4%">&nbsp;</td>
    <td width="4%">L</td>
    <td width="4%">P</td>
    <td width="4%">Jumlah</td>
    <td width="4%">&nbsp;</td>
    <td width="3%">L</td>
    <td width="3%">P</td>
    <td width="4%">Jumlah</td>
    <td width="4%">&nbsp;</td>
    <td width="3%">L</td>
    <td width="3%">P</td>
    <td width="3%">Jumlah</td>
    <td width="4%">&nbsp;</td>
    <td width="2%">L</td>
    <td width="3%">P</td>
    <td width="3%">Jumlah</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;I </td>
    <td bgcolor="#FFFFCC"><? 
	$tahun=date('Y');
    {$s5=$tahun-6;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='01' AND thn BETWEEN '$s5' AND '$tahun'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='01' AND thn BETWEEN '$s5' AND '$tahun'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml;?><? }?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_usia&kel=PAUD&wil=01&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>">lihat</a></td>
    <td bgcolor="#FFECEC"><? 
	$tahun=date('Y');
    {$s6=$tahun-12;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='01' AND thn BETWEEN '$s6' AND '$s5'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='01' AND thn BETWEEN '$s6' AND '$s5'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml; }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_usia&kel=Anak-anak (SD)&wil=01&range=<?=$s6; echo"&nbsp;AND&nbsp;";echo $s5; ?>">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
	$tahun=date('Y');
    {$s13=$tahun-17;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='01' AND thn BETWEEN '$s13' AND '$s6'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='01' AND thn BETWEEN '$s13' AND '$s6'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml; }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_usia&kel=Remaja&wil=01&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
	$tahun=date('Y');
    {$s17=$tahun-35;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='01' AND thn BETWEEN '$s17' AND '$s13'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='01' AND thn BETWEEN '$s17' AND '$s13'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml; }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_usia&kel=Pemuda&wil=01&range=<?=$s17; echo"&nbsp;AND&nbsp;";echo $s13; ?>">lihat</a></td>
    <td bgcolor="#E6F2FF"><? 
	$tahun=date('Y');
    {$s25=$tahun-51;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='01' AND thn BETWEEN '$s25' AND '$s17'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='01' AND thn BETWEEN '$s25' AND '$s17'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_perempuan; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_jml; }?></td>
    <td bgcolor="#E6F2FF"><a href="?act=kel_usia&kel=Dewasa&wil=01&range=<?=$s25; echo"&nbsp;AND&nbsp;";echo $s17; ?>">lihat</a></td>
    <td bgcolor="#ECE0FE"><? 
	$tahun=date('Y');
    {$s50=$tahun-100;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='01' AND thn BETWEEN '$s50' AND '$s25'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='01' AND thn BETWEEN '$s50' AND '$s25'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_jml; }?></td>
    <td bgcolor="#ECE0FE"><a href="?act=kel_usia&kel=Lansia&wil=01&range=<?=$s50; echo"&nbsp;AND&nbsp;";echo $s25; ?>">lihat</a></td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;II </td>
    <td bgcolor="#FFFFCC"><? 
	$tahun=date('Y');
    $s5=$tahun-6;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='02' AND thn BETWEEN '$s5' AND '$tahun'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='02' AND thn BETWEEN '$s5' AND '$tahun'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml; ?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_usia&kel=PAUD&wil=02&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>">lihat</a></td>
    <td bgcolor="#FFECEC"><? 
	$tahun=date('Y');
    {$s6=$tahun-12;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='02' AND thn BETWEEN '$s6' AND '$s5'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='02' AND thn BETWEEN '$s6' AND '$s5'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml; }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_usia&kel=Anak-anak (SD)&wil=02&range=<?=$s6; echo"&nbsp;AND&nbsp;";echo $s5; ?>">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
	$tahun=date('Y');
    {$s13=$tahun-17;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='02' AND thn BETWEEN '$s13' AND '$s6'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='02' AND thn BETWEEN '$s13' AND '$s6'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml; }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_usia&kel=Remaja&wil=02&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
	$tahun=date('Y');
    {$s17=$tahun-35;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='02' AND thn BETWEEN '$s17' AND '$s13'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='02' AND thn BETWEEN '$s17' AND '$s13'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml; }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_usia&kel=Pemuda&wil=02&range=<?=$s17; echo"&nbsp;AND&nbsp;";echo $s13; ?>">lihat</a><a href="?act=kel_usia&kel=Pemuda&wil=02&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>"></a></td>
    <td bgcolor="#E6F2FF"><? 
	$tahun=date('Y');
    {$s25=$tahun-51;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='02' AND thn BETWEEN '$s25' AND '$s17'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='02' AND thn BETWEEN '$s25' AND '$s17'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_perempuan; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_jml; }?></td>
    <td bgcolor="#E6F2FF"><a href="?act=kel_usia&kel=Dewasa&wil=02&range=<?=$s25; echo"&nbsp;AND&nbsp;";echo $s17; ?>">lihat</a></td>
    <td bgcolor="#ECE0FE"><? 
	$tahun=date('Y');
    {$s50=$tahun-100;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='02' AND thn BETWEEN '$s50' AND '$s25'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='02' AND thn BETWEEN '$s50' AND '$s25'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_jml; }?></td>
    <td bgcolor="#ECE0FE"><a href="?act=kel_usia&kel=Lansia&wil=02&range=<?=$s50; echo"&nbsp;AND&nbsp;";echo $s25; ?>">lihat</a></td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;III </td>
    <td bgcolor="#FFFFCC"><? 
	$tahun=date('Y');
    $s5=$tahun-6;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='03' AND thn BETWEEN '$s5' AND '$tahun'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='03' AND thn BETWEEN '$s5' AND '$tahun'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml; ?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_usia&kel=PAUD&wil=03&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>">lihat</a></td>
    <td bgcolor="#FFECEC"><? 
	$tahun=date('Y');
    {$s6=$tahun-12;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='03' AND thn BETWEEN '$s6' AND '$s5'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='03' AND thn BETWEEN '$s6' AND '$s5'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml; }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_usia&kel=Anak-anak (SD)&wil=03&range=<?=$s6; echo"&nbsp;AND&nbsp;";echo $s5; ?>">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
	$tahun=date('Y');
    {$s13=$tahun-17;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='03' AND thn BETWEEN '$s13' AND '$s6'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='03' AND thn BETWEEN '$s13' AND '$s6'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml; }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_usia&kel=Remaja&wil=03&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
	$tahun=date('Y');
    {$s17=$tahun-35;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='03' AND thn BETWEEN '$s17' AND '$s13'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='03' AND thn BETWEEN '$s17' AND '$s13'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml; }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_usia&kel=Pemuda&wil=03&range=<?=$s17; echo"&nbsp;AND&nbsp;";echo $s13; ?>">lihat</a><a href="?act=kel_usia&kel=Pemuda&wil=03&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>"></a></td>
    <td bgcolor="#E6F2FF"><? 
	$tahun=date('Y');
    {$s25=$tahun-51;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='03' AND thn BETWEEN '$s25' AND '$s17'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='03' AND thn BETWEEN '$s25' AND '$s17'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_perempuan; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_jml; }?></td>
    <td bgcolor="#E6F2FF"><a href="?act=kel_usia&kel=Dewasa&wil=03&range=<?=$s25; echo"&nbsp;AND&nbsp;";echo $s17; ?>">lihat</a></td>
    <td bgcolor="#ECE0FE"><? 
	$tahun=date('Y');
    {$s50=$tahun-100;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='03' AND thn BETWEEN '$s50' AND '$s25'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='03' AND thn BETWEEN '$s50' AND '$s25'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_jml; }?></td>
    <td bgcolor="#ECE0FE"><a href="?act=kel_usia&kel=Lansia&wil=03&range=<?=$s50; echo"&nbsp;AND&nbsp;";echo $s25; ?>">lihat</a></td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;IV </td>
    <td bgcolor="#FFFFCC"><? 
	$tahun=date('Y');
    $s5=$tahun-6;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='04' AND thn BETWEEN '$s5' AND '$tahun'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='04' AND thn BETWEEN '$s5' AND '$tahun'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml; ?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_usia&kel=PAUD&wil=04&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>">lihat</a></td>
    <td bgcolor="#FFECEC"><? 
	$tahun=date('Y');
    {$s6=$tahun-12;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='04' AND thn BETWEEN '$s6' AND '$s5'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='04' AND thn BETWEEN '$s6' AND '$s5'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml; }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_usia&kel=Anak-anak (SD)&wil=04&range=<?=$s6; echo"&nbsp;AND&nbsp;";echo $s5; ?>">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
	$tahun=date('Y');
    {$s13=$tahun-17;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='04' AND thn BETWEEN '$s13' AND '$s6'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='04' AND thn BETWEEN '$s13' AND '$s6'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml; }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_usia&kel=Remaja&wil=03&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
	$tahun=date('Y');
    {$s17=$tahun-35;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='04' AND thn BETWEEN '$s17' AND '$s13'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='04' AND thn BETWEEN '$s17' AND '$s13'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml; }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_usia&kel=Pemuda&wil=04&range=<?=$s17; echo"&nbsp;AND&nbsp;";echo $s13; ?>">lihat</a><a href="?act=kel_usia&kel=Pemuda&wil=04&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>"></a></td>
    <td bgcolor="#E6F2FF"><? 
	$tahun=date('Y');
    {$s25=$tahun-51;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='04' AND thn BETWEEN '$s25' AND '$s17'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='05' AND thn BETWEEN '$s25' AND '$s17'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_perempuan; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_jml; }?></td>
    <td bgcolor="#E6F2FF"><a href="?act=kel_usia&kel=Dewasa&wil=04&range=<?=$s25; echo"&nbsp;AND&nbsp;";echo $s17; ?>">lihat</a></td>
    <td bgcolor="#ECE0FE"><? 
	$tahun=date('Y');
    {$s50=$tahun-100;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='04' AND thn BETWEEN '$s50' AND '$s25'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='04' AND thn BETWEEN '$s50' AND '$s25'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_jml; }?></td>
    <td bgcolor="#ECE0FE"><a href="?act=kel_usia&kel=Lansia&wil=04&range=<?=$s50; echo"&nbsp;AND&nbsp;";echo $s25; ?>">lihat</a></td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;v </td>
    <td bgcolor="#FFFFCC"><? 
	$tahun=date('Y');
    $s5=$tahun-6;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='05' AND thn BETWEEN '$s5' AND '$tahun'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='05' AND thn BETWEEN '$s5' AND '$tahun'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml; ?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_usia&kel=PAUD&wil=05&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>">lihat</a></td>
    <td bgcolor="#FFECEC"><? 
	$tahun=date('Y');
    {$s6=$tahun-12;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='05' AND thn BETWEEN '$s6' AND '$s5'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='05' AND thn BETWEEN '$s6' AND '$s5'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml; }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_usia&kel=Anak-anak (SD)&wil=05&range=<?=$s6; echo"&nbsp;AND&nbsp;";echo $s5; ?>">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
	$tahun=date('Y');
    {$s13=$tahun-17;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='05' AND thn BETWEEN '$s13' AND '$s6'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='05' AND thn BETWEEN '$s13' AND '$s6'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml; }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_usia&kel=Remaja&wil=05&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
	$tahun=date('Y');
    {$s17=$tahun-35;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='05' AND thn BETWEEN '$s17' AND '$s13'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='05' AND thn BETWEEN '$s17' AND '$s13'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml; }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_usia&kel=Pemuda&wil=05&range=<?=$s17; echo"&nbsp;AND&nbsp;";echo $s13; ?>">lihat</a><a href="?act=kel_usia&kel=Pemuda&wil=05&range=<?=$s13; echo"&nbsp;AND&nbsp;";echo $s6; ?>"></a></td>
    <td bgcolor="#E6F2FF"><? 
	$tahun=date('Y');
    {$s25=$tahun-51;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='05' AND thn BETWEEN '$s25' AND '$s17'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='05' AND thn BETWEEN '$s25' AND '$s17'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_perempuan; ?></td>
    <td bgcolor="#E6F2FF"><?= $j_jml; }?></td>
    <td bgcolor="#E6F2FF"><a href="?act=kel_usia&kel=Dewasa&wil=05&range=<?=$s25; echo"&nbsp;AND&nbsp;";echo $s17; ?>">lihat</a></td>
    <td bgcolor="#ECE0FE"><? 
	$tahun=date('Y');
    {$s50=$tahun-100;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND ket='05' AND thn BETWEEN '$s50' AND '$s25'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND ket='05' AND thn BETWEEN '$s50' AND '$s25'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECE0FE"><?= $j_jml; }?></td>
    <td bgcolor="#ECE0FE"><a href="?act=kel_usia&kel=Lansia&wil=05&range=<?=$s50; echo"&nbsp;AND&nbsp;";echo $s25; ?>">lihat</a></td>
  </tr>
  <tr>
    <td><b>JUMLAH</b></td>
    <td bgcolor="#DCFBC6"><? 
	$tahun=date('Y');
    $s5=$tahun-6;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND thn BETWEEN '$s5' AND '$tahun'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND thn BETWEEN '$s5' AND '$tahun'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_jml; ?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
    <td bgcolor="#DCFBC6"><? 
	$tahun=date('Y');
    {$s6=$tahun-12;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND thn BETWEEN '$s6' AND '$s5'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND thn BETWEEN '$s6' AND '$s5'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_jml; }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
    <td bgcolor="#DCFBC6"><? 
	$tahun=date('Y');
    {$s13=$tahun-17;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND thn BETWEEN '$s13' AND '$s6'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P'  AND thn BETWEEN '$s13' AND '$s6'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_jml; }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
    <td bgcolor="#DCFBC6"><? 
	$tahun=date('Y');
    {$s17=$tahun-35;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND thn BETWEEN '$s17' AND '$s13'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND thn BETWEEN '$s17' AND '$s13'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_jml; }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
    <td bgcolor="#DCFBC6"><? 
	$tahun=date('Y');
    {$s25=$tahun-51;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND thn BETWEEN '$s25' AND '$s17'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P'  AND thn BETWEEN '$s25' AND '$s17'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_jml; }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
    <td bgcolor="#DCFBC6"><? 
	$tahun=date('Y');
    {$s50=$tahun-100;
	$b_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND thn BETWEEN '$s50' AND '$s25'"); 
	$b_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND thn BETWEEN '$s50' AND '$s25'");
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $j_jml; }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
  </tr>
</table>

</body>
</html>
